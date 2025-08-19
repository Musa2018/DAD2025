
<?php
if (!isset($_SESSION)) session_start();
?>
<div class="sidebar" id="sidebar">
    <ul>
        <li>
            <a href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-text"><?php echo $texts[$lang]['dashboard']; ?></span>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=farmers">
                <i class="fas fa-users"></i>
                <span class="menu-text"><?php echo $texts[$lang]['farmers']; ?></span>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=farms">
                <i class="fas fa-seedling"></i>
                <span class="menu-text"><?php echo $texts[$lang]['farms']; ?></span>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=damages">
                <i class="fas fa-exclamation-triangle"></i>
                <span class="menu-text"><?php echo $texts[$lang]['damages']; ?></span>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=reports">
                <i class="fas fa-chart-bar"></i>
                <span class="menu-text"><?php echo $texts[$lang]['reports']; ?></span>
            </a>
        </li>
        <li>
            <a href="dashboard.php?page=settings">
                <i class="fas fa-cog"></i>
                <span class="menu-text"><?php echo $texts[$lang]['settings']; ?></span>
            </a>
        </li>
    </ul>
</div>
