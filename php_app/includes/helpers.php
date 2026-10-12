<?php
/**
 * Global Utility & Security Helpers
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Context-aware HTML escaping
 */
function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Resolve asset URLs accurately whether running in root or subdirectory
 */
function asset_url(string $path): string {
    $path = ltrim($path, '/');
    // If running in a subfolder or root, calculate relative to current script
    static $base = null;
    if ($base === null) {
        $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
        $base = ($scriptDir === '/' || $scriptDir === '\\') ? '' : rtrim(str_replace('\\', '/', $scriptDir), '/');
    }
    return ($base ? $base . '/' : '/') . $path;
}

/**
 * Generate or retrieve CSRF token from session
 */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token securely
 */
function verify_csrf_token(?string $token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Send JSON API response
 */
function json_response(array $data, int $statusCode = 200): void {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}
