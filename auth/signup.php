<?php
require_once "../translations.php";
include "../db.php";
include "../functions.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filterRequest("username");
    $password = filterRequest("password");
    $email    = filterRequest("email");
    $phone    = filterRequest("phone");
    $verfiycode = rand(10000, 99999);

    // استلام قيمة المحافظة (قد تكون فارغة أو NULL)
    $governorates_id = isset($_POST['governorates_id']) && $_POST['governorates_id'] !== '' 
        ? $_POST['governorates_id'] 
        : null;

    if (empty($username) || empty($password) || empty($email) || empty($phone)) {
        $msg = $texts[$lang]['all_fields_required'];
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
        $stmt->execute(array($email, $phone));
        $count = $stmt->rowCount();

        if ($count > 0) {
            $msg = $texts[$lang]['email_or_phone_exists'];
        } else {
            $data = array(
                "users_name"       => $username,
                "users_password"   => $hashedPassword,
                "users_email"      => $email,
                "users_phone"      => $phone,
                "users_verifycode" => $verfiycode,
                "governorates_id"  => $governorates_id
            );
            if (insertData("users", $data)) {
                // إرسال كود التحقق إلى البريد الإلكتروني
                @sendEmail(
                    $email,
                    $texts[$lang]['verify_code_title'],
                    $texts[$lang]['verify_code_body'] . $verfiycode
                );
                // تحويل المستخدم إلى صفحة التحقق مع تمرير البريد
                header("Location: verifycode.php?email=" . urlencode($email));
                exit;
            } else {
                $msg = $texts[$lang]['register_error'];
            }
        }
    }
}
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $texts[$lang]['register']; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="signup-container">
        <h2><?php echo $texts[$lang]['register']; ?></h2>
        <?php if($msg): ?>
            <div class="msg<?php echo (strpos($msg, $texts[$lang]['success_word']) !== false) ? ' success' : ''; ?>">
                <?php echo htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="username"><?php echo $texts[$lang]['username']; ?></label>
                <input type="text" name="username" id="username" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email"><?php echo $texts[$lang]['email']; ?></label>
                <input type="email" name="email" id="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone"><?php echo $texts[$lang]['phone']; ?></label>
                <input type="text" name="phone" id="phone" required value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password"><?php echo $texts[$lang]['password']; ?></label>
                <input type="password" name="password" id="password" required>
                <span class="eye-icon" onclick="togglePass()">
                    <svg id="eyeIcon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <ellipse cx="12" cy="12" rx="9" ry="5"></ellipse>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                </span>
            </div>
            <div class="form-group">
                <label for="governorates_id"><?php echo $texts[$lang]['governorate']; ?></label>
                <select name="governorates_id" id="governorates_id">
                    <option value=""><?php echo $texts[$lang]['choose_governorate']; ?></option>
                    <?php
                    $govs = $con->query("SELECT governorates_id, governorates_name FROM governorates")->fetchAll(PDO::FETCH_ASSOC);
                    foreach($govs as $gov){
                        $selected = (isset($governorates_id) && $governorates_id == $gov['governorates_id']) ? 'selected' : '';
                        echo '<option value="'.$gov['governorates_id'].'" '.$selected.'>'.$gov['governorates_name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit"><?php echo $texts[$lang]['register_btn']; ?></button>
        </form>
        <div class="links">
            <a href="../index.php"><?php echo $texts[$lang]['login_title']; ?></a>
        </div>
        <div class="lang">
            <a href="../lang.php"><?php echo $texts[$lang]['switch_lang']; ?></a>
        </div>
    </div>
    <script>
    function togglePass(){
      var pass = document.getElementById("password");
      var eye = document.getElementById("eyeIcon");
      if(pass.type === "password"){
        pass.type = "text";
        eye.innerHTML = '<line x1="1" y1="1" x2="23" y2="23" stroke="#888" stroke-width="2"/><ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
      }else{
        pass.type = "password";
        eye.innerHTML = '<ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
      }
    }
    </script>
</body>
</html>
