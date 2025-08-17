<?php
if (!isset($_SESSION)) session_start();
require_once "translations.php";
$msg = $_GET['msg'] ?? '';
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $texts[$lang]['login_title']; ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
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
      <a href="auth/signup.php"><?php echo $texts[$lang]['register']; ?></a>
    </div>

    <div class="lang">
      <a href="lang.php"><?php echo $texts[$lang]['switch_lang']; ?></a>
    </div>
  </div>

  <script>
    function togglePass(){
      var pass = document.getElementById("password");
      var eye = document.getElementById("eyeIcon");
      if(pass.type === "password"){
        pass.type = "text";
        eye.innerHTML = '<line x1="1" y1="1" x2="23" y2="23" stroke="#888" stroke-width="2"/><ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
      } else {
        pass.type = "password";
        eye.innerHTML = '<ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
      }
    }
  </script>
</body>
</html>
