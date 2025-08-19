<?php
require_once '../app/controllers/UserController.php';

$userController = new UserController();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تطبيق ويب ديناميكي</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>تسجيل مستخدم جديد</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل</button>
    </form>

    <h1>تسجيل الدخول</h1>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل الدخول</button>
    </form>

    <?php
    // استدعاء دالة التسجيل أو تسجيل الدخول بناءً على الطلب
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username'])) {
            $userController->register();
        } else {
            $userController->login();
        }
    }
    ?>
</body>
</html>
