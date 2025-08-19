
<?php
if (!isset($_SESSION)) session_start();
require_once __DIR__ . "/../config/translations.php";
$lang = $_SESSION['lang'] ?? 'ar';
?>
<div class="sidebar">
    <div class="sidebar-header">
        <h3><?php echo $texts[$lang]['app_title'] ?? 'نظام إدارة الأضرار'; ?></h3>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-dashboard"></i> <?php echo $texts[$lang]['dashboard']; ?></a></li>
            <li><a href="farmers.php"><i class="fas fa-users"></i> <?php echo $texts[$lang]['farmers']; ?></a></li>
            <li><a href="farms.php"><i class="fas fa-seedling"></i> <?php echo $texts[$lang]['farms']; ?></a></li>
            <li><a href="damage.php"><i class="fas fa-exclamation-triangle"></i> <?php echo $texts[$lang]['damage']; ?></a></li>
            <li><a href="reports.php"><i class="fas fa-chart-bar"></i> <?php echo $texts[$lang]['reports']; ?></a></li>
            <li><a href="docs.php"><i class="fas fa-file-alt"></i> <?php echo $texts[$lang]['docs']; ?></a></li>
        </ul>
    </nav>
</div>
