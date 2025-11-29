<?php
// Show PHP errors (important for the blank-page problem)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Build an absolute path to eqare.db IN THIS FOLDER
    $dbPath = __DIR__ . '/eqare.db';

    if (!file_exists($dbPath)) {
        throw new Exception("Database file not found at: " . $dbPath);
    }

    $conn = new PDO('sqlite:' . $dbPath);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>