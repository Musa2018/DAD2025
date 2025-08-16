<?php
require_once "../translations.php";
include "../db.php";
include "../functions.php";

$msg = "";
$email = filterRequest("email");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filterRequest("email");
    $reset_code = filterRequest("reset_code");

    $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_verifycode = ?");
    $stmt->execute([$email, $reset_code]);
    $user = $stmt->fetch();

    if ($user) {
        // الكود صحيح، حول المستخدم لصفحة تعيين كلمة مرور جديدة
        header("Location: newpassword.php?email=" . urlencode($email));
        exit;
    } else {
        $msg = $texts[$lang]['reset_code_wrong'] ?? "رمز الاستعادة غير صحيح";
    }
}
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $texts[$lang]['reset_code_title'] ?? 'رمز الاستعادة'; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2><?php echo $texts[$lang]['reset_code_title'] ?? 'رمز الاستعادة'; ?></h2>
        <?php if($msg): ?>
            <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="form-group">
                <label for="reset_code"><?php echo $texts[$lang]['reset_code_body'] ?? 'رمز الاستعادة:'; ?></label>
                <input type="text" name="reset_code" id="reset_code" required>
            </div>
            <button type="submit"><?php echo $texts[$lang]['verify_btn'] ?? 'تأكيد'; ?></button>
        </form>
        <div class="links">
            <a href="../index.php"><?php echo $texts[$lang]['login_title']; ?></a>
        </div>
    </div>
</body>
</html>