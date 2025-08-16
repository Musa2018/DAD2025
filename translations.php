<?php
// translations.php
if (!isset($_SESSION)) session_start();

// إذا لم يتم تحديد اللغة بعد في الجلسة أو الكوكي
if (!isset($_SESSION['lang'])) {
    if (isset($_COOKIE['lang'])) {
        $_SESSION['lang'] = $_COOKIE['lang'];
    } else {
        // كشف لغة المتصفح
        $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if ($browserLang === 'en') {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = 'ar'; // الافتراضية
        }
    }
}

// الآن اللغة ثابتة في الجلسة
$lang = $_SESSION['lang'];

$texts = [
    "ar" => [
        "login_title" => "تسجيل الدخول",
        "email" => "البريد الإلكتروني أو اسم المستخدم",
        "password" => "كلمة المرور",
        "show_password" => "إظهار كلمة المرور",
        "login_btn" => "دخول",
        "forgot" => "نسيت كلمة المرور؟",
        "register" => "تسجيل حساب جديد",
        "welcome" => "مرحبًا",
        "success" => "لقد سجلت الدخول بنجاح.",
        "logout" => "تسجيل الخروج",
        "error_login" => "خطأ: بيانات الدخول غير صحيحة!",
        "must_login" => "يجب تسجيل الدخول أولاً",
        "logout_success" => "تم تسجيل الخروج بنجاح",
        "switch_lang" => "English",
        "username" => "اسم المستخدم",
        "phone" => "رقم الجوال",
        "register_btn" => "تسجيل",
        "all_fields_required" => "جميع الحقول مطلوبة",
        "email_or_phone_exists" => "البريد الإلكتروني أو رقم الهاتف مستخدم بالفعل",
        "register_success" => "تم إنشاء الحساب بنجاح. تحقق من بريدك الإلكتروني.",
        "register_error" => "حدث خطأ أثناء إنشاء الحساب",
        "verify_code_title" => "رمز التحقق DAD_APP",
        "verify_code_body" => "رمز التحقق: ",
        "success_word" => "نجاح",
    ],
    "en" => [
        "login_title" => "Login",
        "email" => "Email or Username",
        "password" => "Password",
        "show_password" => "Show Password",
        "login_btn" => "Sign In",
        "forgot" => "Forgot Password?",
        "register" => "Register New Account",
        "welcome" => "Welcome",
        "success" => "You have logged in successfully.",
        "logout" => "Logout",
        "error_login" => "Error: Invalid login credentials!",
        "must_login" => "You must login first",
        "logout_success" => "Logged out successfully",
        "switch_lang" => "العربية",
        "username" => "Username",
        "phone" => "Phone",
        "register_btn" => "Register",
        "all_fields_required" => "All fields are required",
        "email_or_phone_exists" => "Email or phone already exists",
        "register_success" => "Account created successfully. Check your email.",
        "register_error" => "An error occurred during registration",
        "verify_code_title" => "DAD_APP Verification Code",
        "verify_code_body" => "Verification code: ",
        "success_word" => "success",
    ]
];
