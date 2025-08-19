<?php
require_once "../config/translations.php";
if (!isset($_SESSION)) session_start();
?>
<div class="page farmers-page">
    <h2><?php echo $texts[$lang]['farmers']; ?></h2>
    <p><?php echo $texts[$lang]['farmers_page_desc']; ?></p>

    <ul>
        <li><?php echo $lang === 'ar' ? 'إضافة مزارع جديد' : 'Add New Farmer'; ?></li>
        <li><?php echo $lang === 'ar' ? 'عرض قائمة المزارعين' : 'View Farmers List'; ?></li>
        <li><?php echo $lang === 'ar' ? 'تعديل بيانات المزارع' : 'Edit Farmer Data'; ?></li>
    </ul>
</div>
