<?php
/**
 * Database Configuration & Connection Loader
 * Virtual Travel Planner
 */

// Prevent direct execution if needed or define helper functions
if (!function_exists('loadEnvFile')) {
    /**
     * Parse a .env file and load variables into $_ENV and putenv()
     *
     * @param string $path
     * @return array
     */
    function loadEnvFile($path) {
        if (!file_exists($path)) {
            return [];
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $variables = [];

        foreach ($lines as $line) {
            $line = trim($line);
            // Ignore comments
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }

            // Parse KEY=VALUE
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                // Strip quotes if present
                if (
                    (strpos($value, '"') === 0 && substr($value, -1) === '"') ||
                    (strpos($value, "'") === 0 && substr($value, -1) === "'")
                ) {
                    $value = substr($value, 1, -1);
                }

                $variables[$key] = $value;
                $_ENV[$key] = $value;
                putenv("{$key}={$value}");
            }
        }

        return $variables;
    }
}

if (!function_exists('getDbConnection')) {
    /**
     * Retrieve or create a singleton PDO connection
     *
     * @param bool $throwOnError If true, throws exception instead of graceful die
     * @return PDO
     * @throws RuntimeException
     */
    function getDbConnection($throwOnError = false) {
        static $pdo = null;

        if ($pdo !== null) {
            return $pdo;
        }

        $envFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';

        if (!file_exists($envFile)) {
            $errorMsg = "Configuration file (.env) is missing. Please copy .env.example to .env and configure your database credentials.";
            if ($throwOnError) {
                throw new RuntimeException($errorMsg);
            }
            if (php_sapi_name() === 'cli') {
                fwrite(STDERR, "[Error] " . $errorMsg . PHP_EOL);
                exit(1);
            } else {
                http_response_code(500);
                echo "<div style='font-family:sans-serif;padding:20px;background:#fee2e2;color:#991b1b;border:1px solid #f87171;border-radius:6px;max-width:650px;margin:40px auto;line-height:1.5;'>";
                echo "<h3 style='margin-top:0;'>Database Configuration Missing</h3>";
                echo "<p>" . htmlspecialchars($errorMsg) . "</p>";
                echo "</div>";
                exit;
            }
        }

        loadEnvFile($envFile);

        $host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : '127.0.0.1';
        $port = isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : '3306';
        $dbName = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'virtual_travel_planner';
        $user = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root';
        $pass = isset($_ENV['DB_PASS']) ? $_ENV['DB_PASS'] : '';

        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            $errorMsg = "Database connection error: " . $e->getMessage();
            if ($throwOnError) {
                throw new RuntimeException($errorMsg, (int)$e->getCode(), $e);
            }
            if (php_sapi_name() === 'cli') {
                fwrite(STDERR, "[Error] " . $errorMsg . PHP_EOL);
                exit(1);
            } else {
                http_response_code(500);
                echo "<div style='font-family:sans-serif;padding:20px;background:#fee2e2;color:#991b1b;border:1px solid #f87171;border-radius:6px;max-width:650px;margin:40px auto;line-height:1.5;'>";
                echo "<h3 style='margin-top:0;'>Database Connection Failed</h3>";
                echo "<p>Please ensure MySQL is running in XAMPP/WAMP and that your database credentials in <code>.env</code> are correct.</p>";
                echo "<p style='font-size:0.9em;color:#7f1d1d;'><strong>Details:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
                echo "</div>";
                exit;
            }
        }
    }
}
