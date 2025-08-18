<?php
require_once "../translations.php";
if (!isset($_SESSION)) session_start();
?>
<div class="page reports-page">
    <h2><?php echo $texts[$lang]['reports']; ?></h2>
    <p><?php echo $texts[$lang]['reports_page_desc']; ?></p>

    <ul>
        <li><?php echo $lang === 'ar' ? 'تقرير حسب المزارع' : 'Report by Farmers'; ?></li>
        <li><?php echo $lang === 'ar' ? 'تقرير حسب المنطقة' : 'Report by Region'; ?></li>
        <li><?php echo $lang === 'ar' ? 'إحصائيات ورسوم بيانية' : 'Statistics & Charts'; ?></li>
    </ul>
</div>
