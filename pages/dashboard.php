<?php
require_once "../config/translations.php";
require_once "../includes/functions.php";
if (!isset($_SESSION)) session_start();
checkAuthenticate();
$userName = $_SESSION['user_name'] ?? $_SESSION['user_email'] ?? 'المستخدم';
$lang = $_SESSION['lang'] ?? 'ar';

// الحصول على الصفحة المطلوبة من الرابط (GET)
$currentPage = $_GET['page'] ?? null;
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $texts[$lang]['dashboard'] ?? 'لوحة التحكم'; ?></title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>
<body class="dashboard">
    <!-- Header -->
    <header class="top-header">
        <div class="header-actions">
            <a href="../lang.php" class="lang-btn" title="<?php echo $texts[$lang]['switch_lang']; ?>">🌐</a>
            <a href="../auth/logout.php" class="logout-btn" title="<?php echo $texts[$lang]['logout'] ?? 'تسجيل الخروج'; ?>">🔓</a>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <ul>
                <li>
                    <button class="toggle-sidebar"><i class="fas fa-bars"></i></button>
                </li>
                <li><a href="#" data-page="farmers"><i class="fas fa-users"></i><span><?php echo $texts[$lang]['farmers'] ?? 'المزارعين'; ?></span></a></li>
                <li><a href="#" data-page="farms"><i class="fas fa-tractor"></i><span><?php echo $texts[$lang]['farms'] ?? 'المزرعة'; ?></span></a></li>
                <li><a href="#" data-page="damage"><i class="fas fa-exclamation-triangle"></i><span><?php echo $texts[$lang]['damages'] ?? 'الأضرار'; ?></span></a></li>
                <li><a href="#" data-page="docs"><i class="fas fa-file-alt"></i><span><?php echo $texts[$lang]['docs'] ?? 'التوثيق'; ?></span></a></li>
                <li><a href="#" data-page="reports"><i class="fas fa-chart-line"></i><span><?php echo $texts[$lang]['reports'] ?? 'التقارير'; ?></span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="main-content" id="content">
            <?php
            switch($currentPage) {
                case 'farmers':
                    include 'farmers.php';
                    break;
                case 'farms':
                    include 'farms.php';
                    break;
                case 'damage':
                    include 'damage.php';
                    break;
                case 'docs':
                    include 'docs.php';
                    break;
                case 'reports':
                    include 'reports.php';
                    break;
                case 'settings':
                    echo '<h2>إعدادات النظام</h2><p>صفحة الإعدادات قيد التطوير...</p>';
                    break;
                default:
                    ?>
                    <div class="cards-grid">
                        <div class="card">
                            <h2><?php echo $texts[$lang]['welcome'] ?? 'مرحباً'; ?> <?php echo htmlspecialchars($userName); ?></h2>
                            <p><?php echo $texts[$lang]['dashboard_intro'] ?? 'يمكنك إدارة جميع البيانات الخاصة بالمزارعين والمزارع والتقارير من هنا.'; ?></p>
                        </div>
                        <div class="card">
                            <i class="fas fa-users"></i>
                            <h3><?php echo $texts[$lang]['farmers']; ?></h3>
                            <p>إدارة بيانات المزارعين</p>
                            <a href="?page=farmers" class="btn">عرض</a>
                        </div>
                        <div class="card">
                            <i class="fas fa-seedling"></i>
                            <h3><?php echo $texts[$lang]['farms']; ?></h3>
                            <p>إدارة المزارع والأراضي</p>
                            <a href="?page=farms" class="btn">عرض</a>
                        </div>
                        <div class="card">
                            <i class="fas fa-exclamation-triangle"></i>
                            <h3><?php echo $texts[$lang]['damages']; ?></h3>
                            <p>تسجيل ومتابعة الأضرار</p>
                            <a href="?page=damage" class="btn">عرض</a>
                        </div>
                        <div class="card">
                            <i class="fas fa-chart-bar"></i>
                            <h3><?php echo $texts[$lang]['reports']; ?></h3>
                            <p>التقارير والإحصائيات</p>
                            <a href="?page=reports" class="btn">عرض</a>
                        </div>
                    </div>
                    <?php
            }
            ?>
        </main>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const contentDiv = document.getElementById('content');
        const sidebarLinks = document.querySelectorAll('.sidebar a[data-page]');
        const toggleBtn = document.querySelector('.toggle-sidebar');
        const sidebar = document.querySelector('.sidebar');

        function loadPage(page, addToHistory = true) {
            if (!page) return; // تجاهل إذا ما في صفحة
            fetch( page + '.php') // تعديل المسار إلى نسبي
                .then(res => res.text())
                .then(html => {
                    contentDiv.innerHTML = html; // لا نغلف المحتوى داخل card
                    setActiveLink(page);
                    if(addToHistory) history.pushState({page:page}, '', '?page=' + page);
                })
                .catch(err => {
                    contentDiv.innerHTML = '<p>حدث خطأ أثناء تحميل المحتوى.</p>';
                    console.error(err);
                });
        }

        function toggleSidebar() {
            sidebar.classList.toggle('collapsed');
            
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('active');
            }
        }

        function setActiveLink(page){
            sidebarLinks.forEach(l => l.classList.remove('active'));
            const activeLink = Array.from(sidebarLinks).find(l => l.dataset.page === page);
            if(activeLink) activeLink.classList.add('active');
        }

        toggleBtn.addEventListener('click', toggleSidebar);

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

        const initialPage = <?php echo json_encode($currentPage); ?>;
        if(initialPage){
            loadPage(initialPage, false);
        }
    });
    </script>

    <script src="../assets/js/main.js"></script>
</body>
</html>
