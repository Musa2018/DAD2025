
<?php
// ملف الترجمات الأساسي
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// تحديد اللغة الافتراضية
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $_COOKIE['lang'] ?? 'ar';
}

$texts = [
    'ar' => [
        'app_title' => 'نظام إدارة الأضرار الزراعية',
        'dashboard' => 'لوحة التحكم',
        'farmers' => 'المزارعين',
        'farms' => 'المزارع',
        'damages' => 'الأضرار',
        'reports' => 'التقارير',
        'settings' => 'الإعدادات',
        'login' => 'تسجيل الدخول',
        'logout' => 'تسجيل الخروج',
        'register' => 'التسجيل',
        'forgot' => 'نسيان كلمة المرور',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'name' => 'الاسم',
        'phone' => 'رقم الهاتف',
        'submit' => 'إرسال',
        'cancel' => 'إلغاء',
        'save' => 'حفظ',
        'delete' => 'حذف',
        'edit' => 'تعديل',
        'add' => 'إضافة',
        'search' => 'بحث',
        'switch_lang' => 'English',
        'welcome' => 'مرحباً',
        'all_fields_required' => 'جميع الحقول مطلوبة',
        'login_success' => 'تم تسجيل الدخول بنجاح',
        'login_failed' => 'فشل في تسجيل الدخول',
        'logout_success' => 'تم تسجيل الخروج بنجاح',
        'email_not_found' => 'البريد الإلكتروني غير موجود',
        'reset_code_title' => 'رمز الاستعادة',
        'reset_code_body' => 'رمز الاستعادة الخاص بك هو: ',
        'reset_code_wrong' => 'رمز الاستعادة غير صحيح',
        'verify_btn' => 'تأكيد',
        'password_reset_success' => 'تم تغيير كلمة المرور بنجاح',
        'login_title' => 'تسجيل الدخول',
        'login_btn' => 'تسجيل الدخول',
        'rregister' => 'إنشاء حساب جديد',
        'send_reset_code' => 'إرسال رمز الاستعادة'
    ],
    'en' => [
        'app_title' => 'Agricultural Damage Management System',
        'dashboard' => 'Dashboard',
        'farmers' => 'Farmers',
        'farms' => 'Farms',
        'damages' => 'Damages',
        'reports' => 'Reports',
        'settings' => 'Settings',
        'login' => 'Login',
        'logout' => 'Logout',
        'register' => 'Register',
        'forgot' => 'Forgot Password',
        'email' => 'Email',
        'password' => 'Password',
        'name' => 'Name',
        'phone' => 'Phone',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'edit' => 'Edit',
        'add' => 'Add',
        'search' => 'Search',
        'switch_lang' => 'العربية',
        'welcome' => 'Welcome',
        'all_fields_required' => 'All fields are required',
        'login_success' => 'Login successful',
        'login_failed' => 'Login failed',
        'logout_success' => 'Logout successful',
        'email_not_found' => 'Email not found',
        'reset_code_title' => 'Reset Code',
        'reset_code_body' => 'Your reset code is: ',
        'reset_code_wrong' => 'Wrong reset code',
        'verify_btn' => 'Verify',
        'password_reset_success' => 'Password reset successful',
        'login_title' => 'Login',
        'login_btn' => 'Login',
        'rregister' => 'Create Account',
        'send_reset_code' => 'Send Reset Code'
    ]
];
?>
