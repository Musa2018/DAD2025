<?php
require_once "../translations.php";
if (!isset($_SESSION)) session_start();
?>
<div class="page farms-page">
    <h2><?php echo $texts[$lang]['farms']; ?></h2>
    <p><?php echo $texts[$lang]['farms_page_desc']; ?></p>

    <ul>
        <li><?php echo $lang === 'ar' ? 'إضافة مزرعة جديدة' : 'Add New Farm'; ?></li>
        <li><?php echo $lang === 'ar' ? 'عرض قائمة المزارع' : 'View Farms List'; ?></li>
        <li><?php echo $lang === 'ar' ? 'ربط المزارع بالمزارعين' : 'Link Farms to Farmers'; ?></li>
    </ul>
</div>
