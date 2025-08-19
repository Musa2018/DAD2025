
<?php
// ملف الترجمات الأساسي
if (!isset($_SESSION)) session_start();

// إذا لم يتم تحديد اللغة بعد، استخدم العربية كافتراضي
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
}

$texts = [
    'ar' => [
        // عام
        'app_title' => 'نظام إدارة الأضرار الزراعية',
        'dashboard' => 'لوحة التحكم',
        'welcome' => 'مرحباً',
        'logout' => 'تسجيل الخروج',
        
        // تسجيل الدخول
        'login_title' => 'تسجيل الدخول',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'login_btn' => 'دخول',
        'forgot' => 'نسيت كلمة المرور؟',
        'register' => 'إنشاء حساب جديد',
        'error_login' => 'خطأ: بيانات الدخول غير صحيحة!',
        'must_login' => 'يجب تسجيل الدخول أولاً',
        'logout_success' => 'تم تسجيل الخروج بنجاح',
        'switch_lang' => 'English',

        // التسجيل
        'username' => 'اسم المستخدم',
        'phone' => 'رقم الجوال',
        'register_btn' => 'تسجيل',
        'all_fields_required' => 'جميع الحقول مطلوبة',
        'email_or_phone_exists' => 'البريد الإلكتروني أو رقم الهاتف مستخدم بالفعل',
        'register_success' => 'تم إنشاء الحساب بنجاح. تحقق من بريدك الإلكتروني.',
        'register_error' => 'حدث خطأ أثناء إنشاء الحساب',
        'governorate' => 'المحافظة',
        'choose_governorate' => 'اختر المحافظة',
        
        // رموز التحقق واستعادة كلمة المرور
        'verify_code_title' => 'رمز التحقق DAD_APP',
        'verify_code_body' => 'رمز التحقق: ',
        'reset_code_title' => 'كود استعادة كلمة المرور',
        'reset_code_body' => 'كود الاستعادة: ',
        'reset_code_sent' => 'تم إرسال كود الاستعادة إلى بريدك الإلكتروني.',
        'email_not_found' => 'البريد الإلكتروني غير موجود.',
        'send_reset_code' => 'إرسال كود الاستعادة',
        'reset_code_wrong' => 'رمز الاستعادة غير صحيح',
        'verify_btn' => 'تأكيد',
        'passwords_not_match' => 'كلمتا المرور غير متطابقتين',
        'password_reset_success' => 'تم تغيير كلمة المرور بنجاح. يمكنك الآن تسجيل الدخول.',
        
        // القوائم
        'farmers' => 'المزارعون',
        'farms' => 'المزارع',
        'damages' => 'الأضرار',
        'reports' => 'التقارير',
        'settings' => 'الإعدادات',
        'docs' => 'التوثيق',
        'damage_form' => 'استمارة الضرر',
        'welcome_dashboard' => 'مرحباً بك في لوحة التحكم',
        'dashboard_intro' => 'يمكنك إدارة جميع البيانات الخاصة بالمزارعين والمزارع والتقارير من هنا.',
        'docs_page_desc' => 'صفحة التوثيق والمستندات الرسمية',
    ],
    
    'en' => [
        // General
        'app_title' => 'Agricultural Damage Management System',
        'dashboard' => 'Dashboard',
        'welcome' => 'Welcome',
        'logout' => 'Logout',
        
        // Login
        'login_title' => 'Login',
        'email' => 'Email',
        'password' => 'Password',
        'login_btn' => 'Login',
        'forgot' => 'Forgot Password?',
        'register' => 'Create New Account',
        'error_login' => 'Error: Invalid login credentials!',
        'must_login' => 'You must login first',
        'logout_success' => 'Logged out successfully',
        'switch_lang' => 'العربية',

        // Registration
        'username' => 'Username',
        'phone' => 'Phone Number',
        'register_btn' => 'Register',
        'all_fields_required' => 'All fields are required',
        'email_or_phone_exists' => 'Email or phone number already exists',
        'register_success' => 'Account created successfully. Check your email.',
        'register_error' => 'Error occurred while creating account',
        'governorate' => 'Governorate',
        'choose_governorate' => 'Choose Governorate',
        
        // Verification and password reset
        'verify_code_title' => 'DAD_APP Verification Code',
        'verify_code_body' => 'Verification Code: ',
        'reset_code_title' => 'Password Reset Code',
        'reset_code_body' => 'Reset Code: ',
        'reset_code_sent' => 'Reset code sent to your email.',
        'email_not_found' => 'Email not found.',
        'send_reset_code' => 'Send Reset Code',
        'reset_code_wrong' => 'Invalid reset code',
        'verify_btn' => 'Verify',
        'passwords_not_match' => 'Passwords do not match',
        'password_reset_success' => 'Password changed successfully. You can now login.',
        
        // Menus
        'farmers' => 'Farmers',
        'farms' => 'Farms',
        'damages' => 'Damages',
        'reports' => 'Reports',
        'settings' => 'Settings',
        'docs' => 'Documentation',
        'damage_form' => 'Damage Form',
        'welcome_dashboard' => 'Welcome to Dashboard',
        'dashboard_intro' => 'You can manage all data related to farmers, farms and reports from here.',
        'docs_page_desc' => 'Documentation and official documents page',
    ]
];
?>
