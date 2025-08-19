
<?php
if (!isset($_SESSION)) session_start();
require_once __DIR__ . "/../config/translations.php";
require_once __DIR__ . "/../includes/functions.php";

$lang = $_SESSION['lang'] ?? 'ar';
$msgKey = $_GET['msg'] ?? '';
$msg = $texts[$lang][$msgKey] ?? $msgKey;
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
