<?php
/**
 * Submit Quote Handler
 * Processes quote requests, performs server-side validation,
 * and saves validated entries to the MySQL database via PDO prepared statements.
 * Implements the Post-Redirect-Get (PRG) pattern.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/db.php';

/**
 * Validates raw quote form input according to spec rules
 *
 * @param array $input
 * @return array ['isValid' => bool, 'errors' => array, 'clean' => array]
 */
function validateQuoteInput(array $input) {
    $errors = [];
    $clean = [];

    // Allowed service types
    $allowedServices = [
        'Local Car Rental',
        'Outstation Trips',
        'Airport Pickup & Drop',
        'Corporate Rentals'
    ];

    // 1. Name validation: non-empty, max 100 characters
    $name = isset($input['name']) ? trim($input['name']) : '';
    if ($name === '') {
        $errors['name'] = 'Full Name is required.';
    } elseif (mb_strlen($name, 'UTF-8') > 100) {
        $errors['name'] = 'Name cannot exceed 100 characters.';
    } else {
        $clean['name'] = $name;
    }

    // 2. Phone validation: exactly 10 digits
    $phone = isset($input['phone']) ? trim($input['phone']) : '';
    // Strip common formatting spaces/hyphens for robustness
    $phoneDigits = preg_replace('/[\s\-]/', '', $phone);
    if ($phoneDigits === '') {
        $errors['phone'] = 'Phone number is required.';
    } elseif (!preg_match('/^[0-9]{10}$/', $phoneDigits)) {
        $errors['phone'] = 'Phone number must be exactly 10 digits.';
    } else {
        $clean['phone'] = $phoneDigits;
    }

    // 3. Email validation: optional, valid format if provided
    $email = isset($input['email']) ? trim($input['email']) : '';
    if ($email === '') {
        $clean['email'] = null;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email, 'UTF-8') > 100) {
            $errors['email'] = 'Please enter a valid email address.';
        } else {
            $clean['email'] = $email;
        }
    }

    // 4. Service Type validation: must be one of allowed values
    $serviceType = isset($input['service_type']) ? trim($input['service_type']) : '';
    if ($serviceType === '') {
        $errors['service_type'] = 'Please select a service type.';
    } elseif (!in_array($serviceType, $allowedServices, true)) {
        $errors['service_type'] = 'Invalid service type selected. Please choose from the available options.';
    } else {
        $clean['service_type'] = $serviceType;
    }

    // 5. Pickup Date validation: optional, valid YYYY-MM-DD format if provided
    $pickupDate = isset($input['pickup_date']) ? trim($input['pickup_date']) : '';
    if ($pickupDate === '') {
        $clean['pickup_date'] = null;
    } else {
        $d = DateTime::createFromFormat('Y-m-d', $pickupDate);
        if (!$d || $d->format('Y-m-d') !== $pickupDate) {
            $errors['pickup_date'] = 'Pickup date must be a valid date format (YYYY-MM-DD).';
        } else {
            $clean['pickup_date'] = $pickupDate;
        }
    }

    // 6. Message validation: optional, trimmed
    $message = isset($input['message']) ? trim($input['message']) : '';
    if ($message === '') {
        $clean['message'] = null;
    } else {
        $clean['message'] = $message;
    }

    return [
        'isValid' => empty($errors),
        'errors'  => $errors,
        'clean'   => $clean
    ];
}

/**
 * Inserts a validated quote request into MySQL using PDO prepared statements
 *
 * @param PDO $pdo
 * @param array $cleanData
 * @return int Inserted ID
 * @throws PDOException
 */
function insertQuoteRequest(PDO $pdo, array $cleanData) {
    $sql = "INSERT INTO quote_requests (name, phone, email, service_type, pickup_date, message)
            VALUES (:name, :phone, :email, :service_type, :pickup_date, :message)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':name', $cleanData['name'], PDO::PARAM_STR);
    $stmt->bindValue(':phone', $cleanData['phone'], PDO::PARAM_STR);

    if ($cleanData['email'] === null) {
        $stmt->bindValue(':email', null, PDO::PARAM_NULL);
    } else {
        $stmt->bindValue(':email', $cleanData['email'], PDO::PARAM_STR);
    }

    $stmt->bindValue(':service_type', $cleanData['service_type'], PDO::PARAM_STR);

    if ($cleanData['pickup_date'] === null) {
        $stmt->bindValue(':pickup_date', null, PDO::PARAM_NULL);
    } else {
        $stmt->bindValue(':pickup_date', $cleanData['pickup_date'], PDO::PARAM_STR);
    }

    if ($cleanData['message'] === null) {
        $stmt->bindValue(':message', null, PDO::PARAM_NULL);
    } else {
        $stmt->bindValue(':message', $cleanData['message'], PDO::PARAM_STR);
    }

    $stmt->execute();

    return (int)$pdo->lastInsertId();
}

// -------------------------------------------------------------
// HTTP Request Flow (Only executed when accessed through web server)
// -------------------------------------------------------------
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $validation = validateQuoteInput($_POST);

    if (!$validation['isValid']) {
        // Validation failed: preserve user input and store field-level errors
        $_SESSION['flash_errors'] = $validation['errors'];
        $_SESSION['old_input'] = [
            'name'         => isset($_POST['name']) ? (string)$_POST['name'] : '',
            'phone'        => isset($_POST['phone']) ? (string)$_POST['phone'] : '',
            'email'        => isset($_POST['email']) ? (string)$_POST['email'] : '',
            'service_type' => isset($_POST['service_type']) ? (string)$_POST['service_type'] : '',
            'pickup_date'  => isset($_POST['pickup_date']) ? (string)$_POST['pickup_date'] : '',
            'message'      => isset($_POST['message']) ? (string)$_POST['message'] : '',
        ];

        header('Location: contact.php');
        exit;
    }

    // Validation succeeded: connect to DB and insert
    try {
        $pdo = getDbConnection();
        $insertId = insertQuoteRequest($pdo, $validation['clean']);

        // Set success message
        $_SESSION['flash_success'] = "Thank you! Your quote request #{$insertId} has been received. Our team will contact you shortly.";
        // Clear any old input
        unset($_SESSION['old_input']);

        header('Location: contact.php');
        exit;
    } catch (Exception $e) {
        // Handle unexpected DB failure gracefully
        $_SESSION['flash_errors'] = [
            'database' => 'We encountered a problem saving your request. Please try again or call us directly at +91 98765 43210.'
        ];
        $_SESSION['old_input'] = [
            'name'         => isset($_POST['name']) ? (string)$_POST['name'] : '',
            'phone'        => isset($_POST['phone']) ? (string)$_POST['phone'] : '',
            'email'        => isset($_POST['email']) ? (string)$_POST['email'] : '',
            'service_type' => isset($_POST['service_type']) ? (string)$_POST['service_type'] : '',
            'pickup_date'  => isset($_POST['pickup_date']) ? (string)$_POST['pickup_date'] : '',
            'message'      => isset($_POST['message']) ? (string)$_POST['message'] : '',
        ];

        header('Location: contact.php');
        exit;
    }
} elseif (php_sapi_name() !== 'cli') {
    // If accessed directly via GET method in browser, redirect to contact page
    header('Location: contact.php');
    exit;
}
