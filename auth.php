<?php

// if (isset($_SESSION['auth_email'])) {
//     $auth_email = $_SESSION['auth_email'];
// } else {
//     $auth_email = null;
// }

$auth_email = $_SESSION['auth_email'] ?? null;

if (! $auth_email) {
    header('Location: index.php');
}

$user_role_id = $_SESSION['auth_role_id'] ?? 1;
