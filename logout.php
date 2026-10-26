<?php
// logout.php
session_start();

// Keep the user's chosen language across logout
$preserved_lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : null;

// Unset all session variables
$_SESSION = array();

if ($preserved_lang !== null) {
    $_SESSION['lang'] = $preserved_lang;
}

// If it's desired to kill the session, also delete the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect to your home page (change index.php to your home page filename if it's different)
header("Location: index.php");
exit();
?>