<?php

include "../db.php";
include "../functions.php";

// فلترة البريد وكلمة المرور
$email = filterRequest("email");
$password = filterRequest("password");

// جلب بيانات المستخدم بناءً على البريد فقط
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_approve = 1");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['users_password'])) {
    // تسجيل الدخول ناجح
    printSuccess("تم تسجيل الدخول بنجاح");
    // يمكنك هنا وضع كود الجلسة أو إعادة التوجيه
} else {
    printFailure("بيانات الدخول غير صحيحة");
}