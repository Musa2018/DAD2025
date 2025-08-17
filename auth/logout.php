<?php
if (!isset($_SESSION)) session_start();

// تدمير كل بيانات الجلسة
session_unset();
session_destroy();

// إعادة التوجيه إلى صفحة تسجيل الدخول
header("Location: ../index.php?msg=" . urlencode("تم تسجيل الخروج بنجاح"));
exit;
