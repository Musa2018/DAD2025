<?php
$notAuth = true; // عدم حماية صفحة تسجيل الدخول
$page_title = "تسجيل الدخول";
$base_url = "";

require_once "includes/header.php";
?>

<div class="login-container">
    <h2><?php echo $texts[$lang]['login_title']; ?></h2>

    <?php if($msg): ?>
        <div class="msg"><?php echo htmlspecialchars($msg); ?></div>
    <?php endif; ?>

    <form action="auth/login.php" method="post">
        <div class="form-group">
            <label for="email"><?php echo $texts[$lang]['email']; ?></label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group password-group">
            <label for="password"><?php echo $texts[$lang]['password']; ?></label>
            <input type="password" name="password" id="password" required>
            <span class="eye-icon" onclick="togglePass()">
                <svg id="eyeIcon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <ellipse cx="12" cy="12" rx="9" ry="5"></ellipse>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
            </span>
        </div>

        <button type="submit"><?php echo $texts[$lang]['login_btn']; ?></button>
    </form>

    <div class="links">
        <a href="auth/forgot.php"><?php echo $texts[$lang]['forgot']; ?></a> |
        <a href="auth/signup.php"><?php echo $texts[$lang]['rregister']; ?></a>
        </div>

        <div class="lang">
            <a href="lang.php"><?php echo $texts[$lang]['switch_lang']; ?></a>
        </div>
    </div>

<?php require_once "includes/footer.php"; ?>ire_once "includes/footer.php"; ?>