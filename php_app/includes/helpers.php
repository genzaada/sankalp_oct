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

/**
 * Render conference academic full title with dynamic acronym highlights and balanced typography.
 * Directly reads and reflects $config['app_full_title'] so edits in config/app.php
 * are immediately visible across the website without touching template files.
 */
function render_conference_theme_title(?string $title): string {
    if (empty($title)) {
        return '';
    }

    $hasTags = (strip_tags($title) !== $title);
    $output = $hasTags ? $title : htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // Add balanced visual line-breaks if they aren't already present (BEFORE tag insertion)
    if (stripos($output, '<br') === false) {
        $output = preg_replace('/(International Conference on)\s+/i', "$1<br>\n", $output);
        $output = preg_replace('/(Knowledge Systems,)\s+/i', "$1<br>\n", $output);
    }

    // 1. S in Sustainable
    $output = preg_replace('/(\b)(S)(ustainable\b)/i', '$1<span class="acronym-highlight">$2</span>$3', $output);

    // 2. A in Advances
    $output = preg_replace('/(\b)(A)(dvances\b)/i', '$1<span class="acronym-highlight">$2</span>$3', $output);

    // 3. N in ENgineering / eNgineering / Engineering
    $output = preg_replace('/(\b[eE])(N)(gineering\b)/', '$1<span class="acronym-highlight">$2</span>$3', $output);
    $output = preg_replace('/(\b[eE])(n)(gineering\b)/', '$1<span class="acronym-highlight">N</span>$3', $output);

    // 4. K in Knowledge
    $output = preg_replace('/(\b)(K)(nowledge\b)/i', '$1<span class="acronym-highlight">$2</span>$3', $output);

    // 5. A in AI
    $output = preg_replace('/(\b)(A)(I\b)/', '$1<span class="acronym-highlight">$2</span>I', $output);

    // 6. L in InteLligent / Intelligent
    $output = preg_replace('/(\bInte)(L)(l?igent\b)/', '$1<span class="acronym-highlight">$2</span>$3', $output);
    $output = preg_replace('/(\bInte)(l)(l?igent\b)/i', '$1<span class="acronym-highlight">L</span>$3', $output);

    // 7. P in Progress
    $output = preg_replace('/(\b)(P)(rogress\b)/i', '$1<span class="acronym-highlight">$2</span>$3', $output);

    return $output;
}
