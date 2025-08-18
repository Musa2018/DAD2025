<?php
require_once "../translations.php";
if (!isset($_SESSION)) session_start();
?>
<div class="page damage-page">
    <h2><?php echo $texts[$lang]['damage_form']; ?></h2>
    <p><?php echo $texts[$lang]['damage_page_desc']; ?></p>

    <ul>
        <li><?php echo $lang === 'ar' ? 'إضافة استمارة ضرر جديدة' : 'Add New Damage Form'; ?></li>
        <li><?php echo $lang === 'ar' ? 'عرض الاستمارات المقدمة' : 'View Submitted Forms'; ?></li>
        <li><?php echo $lang === 'ar' ? 'تصدير الاستمارات للتقارير' : 'Export Forms to Reports'; ?></li>
    </ul>
</div>
