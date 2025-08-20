<?php
require_once "../translations.php";
require_once "../functions.php";
if (!isset($_SESSION)) session_start();
checkAuthenticate();
$userName = $_SESSION['user_name'] ?? $_SESSION['user_email'] ?? 'المستخدم';

// الحصول على الصفحة المطلوبة من الرابط (GET)
$currentPage = $_GET['page'] ?? null;
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $texts[$lang]['dashboard'] ?? 'لوحة التحكم'; ?></title>
    <link rel="stylesheet" href="/dad/assets/style.css">
    <link rel="stylesheet" href="/dad/assets/fontawesome/css/all.min.css">
    
</head>
<body class="dashboard">

<header class="top-header">
    <div class="header-actions">
        <a href="/dad/lang.php" class="lang-btn" title="<?php echo $texts[$lang]['switch_lang']; ?>">🌐</a>
        <a href="/dad/auth/logout.php" class="logout-btn" title="<?php echo $texts[$lang]['logout'] ?? 'تسجيل الخروج'; ?>">🔓</a>
    </div>
</header>
<div class="dashboard-container">
<div class="sidebar">
    <ul>
        <li>
            <button class="toggle-sidebar"><i class="fas fa-bars"></i></button>
        </li>
        <li><a href="#" data-page="farmers"><i class="fas fa-users"></i><span><?php echo $texts[$lang]['farmers'] ?? 'المزارعين'; ?></span></a></li>
        <li><a href="#" data-page="farms"><i class="fas fa-tractor"></i><span><?php echo $texts[$lang]['farms'] ?? 'المزرعة'; ?></span></a></li>
        <li><a href="#" data-page="damage"><i class="fas fa-exclamation-triangle"></i><span><?php echo $texts[$lang]['damage_form'] ?? 'استمارة الضرر'; ?></span></a></li>
        <li><a href="#" data-page="docs"><i class="fas fa-file-alt"></i><span><?php echo $texts[$lang]['docs'] ?? 'التوثيق'; ?></span></a></li>
        <li><a href="#" data-page="reports"><i class="fas fa-chart-line"></i><span><?php echo $texts[$lang]['reports'] ?? 'التقارير'; ?></span></a></li>
    </ul>
</div>

<div class="main-content" id="content">
    <?php if (!$currentPage): ?>
        <div class="">
            <div  class="">
                <h2><?php echo $texts[$lang]['welcome_dashboard'] ?? 'مرحباً بك في لوحة التحكم'; ?>, <?php echo htmlspecialchars($userName); ?></h2>
                <p><?php echo $texts[$lang]['dashboard_intro'] ?? 'يمكنك إدارة جميع البيانات الخاصة بالمزارعين والمزارع والتقارير من هنا.'; ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const contentDiv = document.getElementById('content');
    const sidebarLinks = document.querySelectorAll('.sidebar a');
    const toggleBtn = document.querySelector('.toggle-sidebar');
    const sidebar = document.querySelector('.sidebar');

    function loadPage(page, addToHistory = true) {
        fetch('/dad/pages/' + page + '.php')
            .then(res => res.text())
            .then(html => {
                // لف المحتوى داخل div.cards-grid > div.card
                contentDiv.innerHTML = '<div ><div >' + html + '</div></div>';
                setActiveLink(page);
                if(addToHistory) history.pushState({page:page}, '', '?page=' + page);
            })
            .catch(err => {
                contentDiv.innerHTML = '<div class="cards-grid"><div class="card"><p>حدث خطأ أثناء تحميل المحتوى.</p></div></div>';
                console.error(err);
            });
    }
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
    
    // إضافة/إزالة الطبقة active للوضع المدمج
    if (window.innerWidth <= 768) {
        sidebar.classList.toggle('active');
    }
}
    function setActiveLink(page){
        sidebarLinks.forEach(l => l.classList.remove('active'));
        const activeLink = Array.from(sidebarLinks).find(l => l.dataset.page === page);
        if(activeLink) activeLink.classList.add('active');
    }

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });

    window.addEventListener('popstate', e => {
        const page = e.state?.page || null;
        if(page) loadPage(page, false);
    });

    sidebarLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            loadPage(link.dataset.page);
        });
    });

    const initialPage = "<?php echo $currentPage; ?>";
    if(initialPage){
        loadPage(initialPage, false);
    }
});
</script>

</body>
</html>
