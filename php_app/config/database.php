<?php
/**
 * Secure PDO Database Connector
 * Uses prepared statements and exception handling
 */

function get_db_connection(): ?PDO {
    static $pdo = null;
    static $attempted = false;

    if ($pdo !== null) {
        return $pdo;
    }

    if ($attempted) {
        return null;
    }

    $attempted = true;
    $config = require __DIR__ . '/app.php';
    $db = $config['database'];

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $db['host'],
        $db['port'],
        $db['name'],
        $db['charset']
    );

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $db['user'], $db['pass'], $options);
        return $pdo;
    } catch (PDOException $e) {
        // Log silently without disclosing credentials or internal details
        error_log('Database connection failed: ' . $e->getMessage());
        return null;
    }
}
