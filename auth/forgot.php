<?php
require_once "../translations.php";
include "../db.php";
include "../functions.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filterRequest("email");
    if (empty($email)) {
        $msg = $texts[$lang]['all_fields_required'];
    } else {
        $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
            $reset_code = rand(10000, 99999);
            updateData("users", ["users_verifycode" => $reset_code], "users_email = '$email'");
            @sendEmail($email, $texts[$lang]['reset_code_title'], $texts[$lang]['reset_code_body'] . $reset_code);
            // إعادة التوجيه إلى صفحة التحقق مع تمرير البريد
            header("Location: resetcode.php?email=" . urlencode($email));
            exit;
        } else {
            $msg = $texts[$lang]['email_not_found'];
        }
    }
}
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $texts[$lang]['forgot']; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="login-container">
        <h2><?php echo $texts[$lang]['forgot']; ?></h2>
        <?php if($msg): ?>
            <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email"><?php echo $texts[$lang]['email']; ?></label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit"><?php echo $texts[$lang]['send_reset_code']; ?></button>
        </form>
        <div class="links">
            <a href="../index.php"><?php echo $texts[$lang]['login_title']; ?></a>
        </div>
    </div>
</body>
</html>