<?php
require_once "../translations.php";
include "../db.php";
include "../functions.php";

$msg = "";
$email = filterRequest("email");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filterRequest("email");
    $password = filterRequest("password");
    $confirm  = filterRequest("confirm");

    if (empty($password) || empty($confirm)) {
        $msg = $texts[$lang]['all_fields_required'];
    } elseif ($password !== $confirm) {
        $msg = $texts[$lang]['passwords_not_match'] ?? "كلمتا المرور غير متطابقتين";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE users SET users_password = ?, users_verifycode = NULL WHERE users_email = ?");
        $stmt->execute([$hashedPassword, $email]);
        $msg = $texts[$lang]['password_reset_success'] ?? "تم تغيير كلمة المرور بنجاح. يمكنك الآن تسجيل الدخول.";
        // إعادة التوجيه بعد ثوانٍ
        echo '<meta http-equiv="refresh" content="2;url=../index.php">';
    }
}
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $texts[$lang]['reset_code_title']; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2><?php echo $texts[$lang]['reset_code_title']; ?></h2>
        <?php if($msg): ?>
            <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="form-group">
                <label for="password"><?php echo $texts[$lang]['password']; ?></label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm"><?php echo $texts[$lang]['password']; ?> (تأكيد)</label>
                <input type="password" name="confirm" id="confirm" required>
            </div>
            <button type="submit"><?php echo $texts[$lang]['reset_code_title']; ?></button>
        </form>
        <div class="links">
            <a href="../index.php"><?php echo $texts[$lang]['login_title']; ?></a>
        </div>
    </div>
</body>
</html>