<?php
session_start();

// Initialize the last URL session variable if it doesn't exist
if (!isset($_SESSION['last_url'])) {
    $_SESSION['last_url'] = '';
}

// Store the current URL as the last URL
$currentUrl = $_SERVER['REQUEST_URI'];
$_SESSION['last_url'] = $currentUrl;

// To retrieve the last URL later
$lastRequestedUrl = isset($_SESSION['last_url']) ? $_SESSION['last_url'] : "No last URL recorded.";

echo "Last requested URL: " . htmlspecialchars($lastRequestedUrl);
?>
