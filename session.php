<?php
//Start session
session_start();

// تحقق مما إذا كان متغير الجلسة "user_id" موجودًا أم لا
if (!isset($_SESSION['user_id']) || trim($_SESSION['user_id']) == '') {
    header("Location: index.php");
    exit();
}

// تحقق من وقت النشاط الأخير
$inactive_timeout = 600; // 10 minutes (10 min * 60 sec)
$last_activity_time = $_SESSION['last_activity_time'] ?? time();

// تحقق مما إذا كان المستخدم غير نشط للوقت المحدد أو أكثر
if (time() - $last_activity_time > $inactive_timeout) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page
    header("Location: index.php");
    exit();
}

// Update the last activity time
$_SESSION['last_activity_time'] = time();

// Continue with the rest of the page
$session_id = $_SESSION['user_id'];
