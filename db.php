<?php
// تضمين إعدادات قاعدة البيانات
require_once __DIR__ . "/config/database.php";

// تضمين دوال المشروع
require_once __DIR__ . "/includes/functions.php";

// حماية الصفحات إذا لم يتم تعطيلها
if (!isset($notAuth) && function_exists('checkAuthenticate')) {
    checkAuthenticate();
}
?>