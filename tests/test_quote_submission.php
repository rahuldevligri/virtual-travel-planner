<?php
/**
 * Test Suite: Quote Submission & Validation
 * Virtual Travel Planner
 *
 * Runs tests for all 6 scenarios specified in spec.md:
 * 1. Submitting valid data -> row inserted in DB, ID returned
 * 2. Submitting empty name -> validation error shown, no DB insert
 * 3. Submitting 5-digit phone -> validation error shown, no DB insert
 * 4. Submitting invalid email -> validation error shown, no DB insert
 * 5. Submitting service_type = "hack" -> allowlist error shown, no DB insert
 * 6. SQL injection attempt in name -> safely parameterized with PDO, no breach
 */

$isCli = (php_sapi_name() === 'cli');

function outputText($text, $status = null) {
    global $isCli;
    if ($isCli) {
        $prefix = '';
        if ($status === 'PASS') {
            $prefix = "\033[32m[PASS]\033[0m ";
        } elseif ($status === 'FAIL') {
            $prefix = "\033[31m[FAIL]\033[0m ";
        } elseif ($status === 'INFO') {
            $prefix = "\033[34m[INFO]\033[0m ";
        } elseif ($status === 'WARN') {
            $prefix = "\033[33m[WARN]\033[0m ";
        }
        echo $prefix . $text . PHP_EOL;
    } else {
        $color = '#333';
        if ($status === 'PASS') $color = '#15803d';
        if ($status === 'FAIL') $color = '#b91c1c';
        if ($status === 'INFO') $color = '#1d4ed8';
        if ($status === 'WARN') $color = '#b45309';
        echo "<div style='font-family:monospace;margin-bottom:6px;color:{$color};'>";
        if ($status) {
            echo "<strong>[{$status}]</strong> ";
        }
        echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . "</div>";
    }
}

if (!$isCli) {
    echo "<!DOCTYPE html><html><head><meta charset='utf-8'><title>Test Results</title>";
    echo "<style>body{font-family:sans-serif;padding:30px;background:#f8fafc;max-width:850px;margin:0 auto;}</style></head><body>";
    echo "<h2>Virtual Travel Planner - Test Suite</h2>";
}

// -------------------------------------------------------------------------
// PREREQUISITE CHECK:
// Verify that MySQL is reachable and the quote_requests table exists.
// If not, print: "Please start MySQL in XAMPP and import sql/schema.sql first."
// Do NOT auto-create the database from the test script.
// -------------------------------------------------------------------------

$envPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';
if (!file_exists($envPath)) {
    // If .env doesn't exist, check if .env.example can be referenced or instruct user
    outputText("Configuration Error: .env file was not found in project root.", "FAIL");
    outputText("Please copy .env.example to .env and configure your database credentials.", "WARN");
    outputText("Please start MySQL in XAMPP and import sql/schema.sql first.", "WARN");
    if (!$isCli) echo "</body></html>";
    exit(1);
}

require_once dirname(__DIR__) . '/config/db.php';
require_once dirname(__DIR__) . '/submit_quote.php';

$pdo = null;
try {
    // Call getDbConnection with throwOnError = true
    $pdo = getDbConnection(true);

    // Verify quote_requests table exists
    $tableCheckStmt = $pdo->query("SHOW TABLES LIKE 'quote_requests'");
    $tableExists = $tableCheckStmt->fetchColumn();

    if (!$tableExists) {
        outputText("Table 'quote_requests' does not exist in the database.", "FAIL");
        outputText("Please start MySQL in XAMPP and import sql/schema.sql first.", "WARN");
        if (!$isCli) echo "</body></html>";
        exit(1);
    }
} catch (Exception $e) {
    outputText("Database connection could not be established: " . $e->getMessage(), "FAIL");
    outputText("Please start MySQL in XAMPP and import sql/schema.sql first.", "WARN");
    if (!$isCli) echo "</body></html>";
    exit(1);
}

outputText("Database connection verified. Table 'quote_requests' is ready.", "INFO");
outputText("----------------------------------------------------------------", null);

// -------------------------------------------------------------------------
// RUN TEST CASES
// -------------------------------------------------------------------------

$passed = 0;
$failed = 0;

function recordTestResult($name, $isSuccess, $details = '') {
    global $passed, $failed;
    if ($isSuccess) {
        $passed++;
        outputText("{$name} - {$details}", "PASS");
    } else {
        $failed++;
        outputText("{$name} - {$details}", "FAIL");
    }
}

// -------------------------------------------------------------------------
// Test 1: Submitting valid data -> row inserted in DB, success message/ID shown
// -------------------------------------------------------------------------
$test1Data = [
    'name'         => 'Ramesh Sharma',
    'phone'        => '9829012345',
    'email'        => 'ramesh.sharma@example.com',
    'service_type' => 'Local Car Rental',
    'pickup_date'  => date('Y-m-d', strtotime('+3 days')),
    'message'      => 'Need full-day local Jaipur sightseeing for family of 4.'
];

$test1Val = validateQuoteInput($test1Data);
if ($test1Val['isValid']) {
    try {
        $insertedId = insertQuoteRequest($pdo, $test1Val['clean']);
        if ($insertedId > 0) {
            // Verify record in database
            $verifyStmt = $pdo->prepare("SELECT * FROM quote_requests WHERE id = :id");
            $verifyStmt->execute([':id' => $insertedId]);
            $row = $verifyStmt->fetch();

            if ($row && $row['phone'] === '9829012345') {
                recordTestResult("Test 1: Valid Data Submission", true, "Row inserted with ID #{$insertedId} and verified in DB.");
            } else {
                recordTestResult("Test 1: Valid Data Submission", false, "Row inserted but verification fetch failed.");
            }
        } else {
            recordTestResult("Test 1: Valid Data Submission", false, "Insert did not return a valid row ID.");
        }
    } catch (Exception $e) {
        recordTestResult("Test 1: Valid Data Submission", false, "Database error: " . $e->getMessage());
    }
} else {
    recordTestResult("Test 1: Valid Data Submission", false, "Validation unexpectedly failed for valid data.");
}

// -------------------------------------------------------------------------
// Test 2: Submitting with empty name -> error shown, no DB insert
// -------------------------------------------------------------------------
$test2Data = [
    'name'         => '   ',
    'phone'        => '9829012345',
    'email'        => 'user@example.com',
    'service_type' => 'Outstation Trips',
    'pickup_date'  => date('Y-m-d'),
    'message'      => 'Testing empty name'
];

$test2CountBefore = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();
$test2Val = validateQuoteInput($test2Data);
$test2CountAfter = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();

if (!$test2Val['isValid'] && isset($test2Val['errors']['name']) && $test2CountBefore === $test2CountAfter) {
    recordTestResult("Test 2: Empty Name Validation", true, "Caught error: '{$test2Val['errors']['name']}', 0 rows inserted.");
} else {
    recordTestResult("Test 2: Empty Name Validation", false, "Failed to reject empty name or DB count changed.");
}

// -------------------------------------------------------------------------
// Test 3: Submitting with 5-digit phone -> error shown, no DB insert
// -------------------------------------------------------------------------
$test3Data = [
    'name'         => 'Pooja Verma',
    'phone'        => '12345',
    'email'        => 'pooja@example.com',
    'service_type' => 'Airport Pickup & Drop',
    'pickup_date'  => date('Y-m-d'),
    'message'      => 'Testing 5-digit phone'
];

$test3CountBefore = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();
$test3Val = validateQuoteInput($test3Data);
$test3CountAfter = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();

if (!$test3Val['isValid'] && isset($test3Val['errors']['phone']) && $test3CountBefore === $test3CountAfter) {
    recordTestResult("Test 3: 5-Digit Phone Validation", true, "Caught error: '{$test3Val['errors']['phone']}', 0 rows inserted.");
} else {
    recordTestResult("Test 3: 5-Digit Phone Validation", false, "Failed to reject short phone number or DB count changed.");
}

// -------------------------------------------------------------------------
// Test 4: Submitting with invalid email -> error shown, no DB insert
// -------------------------------------------------------------------------
$test4Data = [
    'name'         => 'Vikram Singh',
    'phone'        => '9829012345',
    'email'        => 'invalid-email-address',
    'service_type' => 'Local Car Rental',
    'pickup_date'  => date('Y-m-d'),
    'message'      => 'Testing invalid email'
];

$test4CountBefore = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();
$test4Val = validateQuoteInput($test4Data);
$test4CountAfter = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();

if (!$test4Val['isValid'] && isset($test4Val['errors']['email']) && $test4CountBefore === $test4CountAfter) {
    recordTestResult("Test 4: Invalid Email Validation", true, "Caught error: '{$test4Val['errors']['email']}', 0 rows inserted.");
} else {
    recordTestResult("Test 4: Invalid Email Validation", false, "Failed to reject invalid email format or DB count changed.");
}

// -------------------------------------------------------------------------
// Test 5: Submitting service_type = "hack" -> error shown (allowlist check)
// -------------------------------------------------------------------------
$test5Data = [
    'name'         => 'Suresh Kumar',
    'phone'        => '9829012345',
    'email'        => 'suresh@example.com',
    'service_type' => 'hack',
    'pickup_date'  => date('Y-m-d'),
    'message'      => 'Testing service type tamper'
];

$test5CountBefore = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();
$test5Val = validateQuoteInput($test5Data);
$test5CountAfter = (int)$pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();

if (!$test5Val['isValid'] && isset($test5Val['errors']['service_type']) && $test5CountBefore === $test5CountAfter) {
    recordTestResult("Test 5: Service Allowlist Validation", true, "Caught error: '{$test5Val['errors']['service_type']}', 0 rows inserted.");
} else {
    recordTestResult("Test 5: Service Allowlist Validation", false, "Failed to enforce service type allowlist or DB count changed.");
}

// -------------------------------------------------------------------------
// Test 6: SQL injection attempt in name -> safely escaped, no breach
// -------------------------------------------------------------------------
$injectionPayload = "' OR 1=1 --";
$test6Data = [
    'name'         => $injectionPayload,
    'phone'        => '9829012345',
    'email'        => 'sqli@example.com',
    'service_type' => 'Corporate Rentals',
    'pickup_date'  => date('Y-m-d'),
    'message'      => "Payload message: '; DROP TABLE quote_requests; --"
];

$test6Val = validateQuoteInput($test6Data);
if ($test6Val['isValid']) {
    try {
        $injectId = insertQuoteRequest($pdo, $test6Val['clean']);

        // Check if table quote_requests still exists and wasn't harmed
        $checkTableStmt = $pdo->query("SHOW TABLES LIKE 'quote_requests'");
        $tableStillExists = $checkTableStmt->fetchColumn();

        // Fetch back the exact row
        $fetchStmt = $pdo->prepare("SELECT * FROM quote_requests WHERE id = :id");
        $fetchStmt->execute([':id' => $injectId]);
        $row = $fetchStmt->fetch();

        if ($tableStillExists && $row && $row['name'] === $injectionPayload) {
            recordTestResult(
                "Test 6: SQL Injection Protection Check",
                true,
                "Payload successfully stored as literal data with prepared statement. Table structure intact."
            );
        } else {
            recordTestResult("Test 6: SQL Injection Protection Check", false, "Table check or literal payload match failed.");
        }
    } catch (Exception $e) {
        recordTestResult("Test 6: SQL Injection Protection Check", false, "Unexpected exception: " . $e->getMessage());
    }
} else {
    recordTestResult("Test 6: SQL Injection Protection Check", false, "Input validation unexpectedly failed for SQL string payload.");
}

// -------------------------------------------------------------------------
// SUMMARY
// -------------------------------------------------------------------------
outputText("----------------------------------------------------------------", null);
outputText("Summary: {$passed} Passed, {$failed} Failed (Total: " . ($passed + $failed) . ")", ($failed === 0 ? "PASS" : "FAIL"));

if (!$isCli) {
    echo "</body></html>";
}

exit($failed === 0 ? 0 : 1);
