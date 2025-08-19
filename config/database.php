
<?php
// إعدادات الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "dad";
$user = "root";
$pass = "";
$charset = "utf8mb4"; // دعم كامل للعربية والإيموجي

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // إظهار الأخطاء
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // استرجاع البيانات كمصفوفة
    PDO::ATTR_EMULATE_PREPARES => false, // استعلامات محضرة حقيقية
];

try {
    $con = new PDO($dsn, $user, $pass, $options);
    
    // إعداد رؤوس CORS إذا لزم
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Methods: POST, OPTIONS, GET");

} catch (PDOException $e) {
    // عرض رسالة الخطأ بطريقة آمنة
    echo "خطأ في الاتصال بقاعدة البيانات: " . htmlspecialchars($e->getMessage());
    exit;
}
?>
