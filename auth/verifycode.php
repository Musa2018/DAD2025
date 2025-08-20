<?php
include "../db.php";
include "../functions.php";

$msg = "";
$email = filterRequest("email");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verfiy = filterRequest("verifycode");
    $email  = filterRequest("email");

    $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_verifycode = ?");
    $stmt->execute([$email, $verfiy]);
    $count = $stmt->rowCount();

    if ($count > 0) {
        $data = array("users_approve" => "1");
        updateData("users", $data, "users_email = '$email'");
        $msg = "تم التحقق بنجاح! يمكنك الآن تسجيل الدخول.";
        // يمكنك إعادة التوجيه هنا إذا أردت
    } else {
        $msg = "رمز التحقق غير صحيح";
    }
}
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>التحقق من البريد الإلكتروني</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="signup">
    <div class="signup-container">
        <h2>التحقق من البريد الإلكتروني</h2>
        <?php if($msg): ?>
            <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="form-group">
                <label for="verifycode">رمز التحقق</label>
                <input type="text" name="verifycode" id="verifycode" required>
            </div>
            <button type="submit">تأكيد</button>
        </form>
        <div class="links">
            <a href="../index.php">العودة لتسجيل الدخول</a>
        </div>
    </div>
</body>
</html>