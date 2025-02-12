<?php
// API Keys
define('YOUTUBE_API_KEY', 'AIzaSyDCnNRAyzmfGTLlFyQ3gCzv_jyExuok_9E'); // Replace with your actual YouTube Data API key

// File Upload Settings
define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024); // 10MB
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
define('ALLOWED_PDF_TYPES', ['application/pdf']);

// Directory Paths
define('UPLOAD_DIR', dirname(__DIR__) . '/uploads/');
define('IMAGE_UPLOAD_DIR', UPLOAD_DIR . 'images/');
define('PDF_UPLOAD_DIR', UPLOAD_DIR . 'pdf/');
define('WORD_UPLOAD_DIR', UPLOAD_DIR . 'word/');
define('YOUTUBE_UPLOAD_DIR', UPLOAD_DIR . 'youtube/');

// Create upload directories if they don't exist
$directories = [
    UPLOAD_DIR,
    IMAGE_UPLOAD_DIR,
    PDF_UPLOAD_DIR,
    WORD_UPLOAD_DIR,
    YOUTUBE_UPLOAD_DIR
];

foreach ($directories as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));

// Time Zone
date_default_timezone_set('UTC');

// Database Configuration (if needed)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'techxalt');

// Security Settings
define('CSRF_TOKEN_NAME', 'csrf_token');
define('CSRF_TOKEN_LENGTH', 32);

// Function to generate CSRF token
function generateCsrfToken() {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(CSRF_TOKEN_LENGTH / 2));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

// Function to validate CSRF token
function validateCsrfToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && 
           hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

// Function to sanitize output
function sanitizeOutput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Function to validate file upload
function validateFileUpload($file, $allowedTypes, $maxSize = MAX_UPLOAD_SIZE) {
    $errors = [];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'File upload failed with error code: ' . $file['error'];
    }
    
    if ($file['size'] > $maxSize) {
        $errors[] = 'File size exceeds limit of ' . formatBytes($maxSize);
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mimeType, $allowedTypes)) {
        $errors[] = 'Invalid file type. Allowed types: ' . implode(', ', $allowedTypes);
    }
    
    return $errors;
}

// Function to format bytes
function formatBytes($bytes) {
    if ($bytes === 0) return '0 Bytes';
    $k = 1024;
    $sizes = ['Bytes', 'KB', 'MB', 'GB'];
    $i = floor(log($bytes) / log($k));
    return round($bytes / pow($k, $i), 2) . ' ' . $sizes[$i];
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
