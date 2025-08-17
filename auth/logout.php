<?php
if (!isset($_SESSION)) session_start();

$lang = $_SESSION['lang'] ?? 'ar';

// تدمير الجلسة
session_unset();
session_destroy();

// إعادة التوجيه بمفتاح الرسالة
header("Location: ../index.php?msg=logout_success");
exit;
