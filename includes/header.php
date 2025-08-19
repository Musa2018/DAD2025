<?php
// منع أي إخراج قبل session_start
ob_start();

// بدء الجلسة إذا لم تكن مبدأة
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// تحديد المسار الأساسي وتضمين الملفات المطلوبة
$base_url = $base_url ?? "";

require_once $base_url . "config/database.php";
require_once $base_url . "config/translations.php";
require_once $base_url . "includes/functions.php";

$lang = $_SESSION['lang'] ?? 'ar';
$msgKey = $_GET['msg'] ?? '';
$msg = $texts[$lang][$msgKey] ?? $msgKey;

// تطهير المخزن المؤقت وإرسال المحتوى
ob_end_clean();
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? $texts[$lang]['app_title'] ?? 'نظام إدارة الأضرار الزراعية'; ?></title>
    <link rel="stylesheet" href="<?php echo $base_url ?? ''; ?>/assets/style.css">
    <link rel="stylesheet" href="<?php echo $base_url ?? ''; ?>/assets/fontawesome/css/all.min.css">
</head>
<body>