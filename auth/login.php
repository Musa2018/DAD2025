<?php
if (!isset($_SESSION)) session_start();

include "../config/database.php";
include "../includes/functions.php";
if (!isset($_SESSION)) session_start();

$lang = $_SESSION['lang'] ?? 'ar';
// فلترة البريد وكلمة المرور
$email = filterRequest("email");
$password = filterRequest("password");

// جلب بيانات المستخدم بناءً على البريد فقط والموافقة
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_approve = 1");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['users_password'])) {
    // تسجيل الدخول ناجح
     
    $_SESSION['user_id']    = $user['users_id'];   // تأكد من اسم العمود في قاعدة البيانات
    $_SESSION['user_name']  = $user['users_name'];
    $_SESSION['user_email'] = $user['users_email'];

    header("Location: ../pages/dashboard.php");
    exit;
} else {
    header("Location: ../index.php?msg=error_login" );
    exit;
}
