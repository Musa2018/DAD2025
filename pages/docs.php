
<?php
require_once "../config/translations.php";
if (!isset($_SESSION)) session_start();
$lang = $_SESSION['lang'] ?? 'ar';
?>
<div class="page docs-page">
    <h2><?php echo $texts[$lang]['docs']; ?></h2>
    <p><?php echo $texts[$lang]['docs_page_desc']; ?></p>

    <ul>
        <li><?php echo $lang === 'ar' ? 'دليل المستخدم' : 'User Guide'; ?></li>
        <li><?php echo $lang === 'ar' ? 'الإجراءات الرسمية' : 'Official Procedures'; ?></li>
        <li><?php echo $lang === 'ar' ? 'تحميل ملفات PDF' : 'Download PDF Files'; ?></li>
        <li><?php echo $lang === 'ar' ? 'النماذج والاستمارات' : 'Forms and Templates'; ?></li>
        <li><?php echo $lang === 'ar' ? 'التعليمات الفنية' : 'Technical Instructions'; ?></li>
    </ul>
</div>
