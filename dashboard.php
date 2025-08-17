<?php


require_once "translations.php";
require_once "functions.php";
if (!isset($_SESSION)) session_start();
// حماية الصفحة من الوصول غير المصرح به
checkAuthenticate();
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $texts[$lang]['dashboard'] ?? 'لوحة التحكم'; ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="dashboard">
    <!-- رابط تغيير اللغة -->
    <div class="lang">
        <a href="lang.php"><?php echo $texts[$lang]['switch_lang']; ?></a> |
        <a href="auth/logout.php"><?php echo $texts[$lang]['logout'] ?? 'تسجيل الخروج'; ?></a>
    </div>

    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <h3><?php echo $texts[$lang]['dashboard'] ?? 'لوحة التحكم'; ?></h3>
        <ul>
            <li><a href="#" data-page="farmers"><i class="fas fa-user-farmer"></i><span><?php echo $texts[$lang]['farmers'] ?? 'المزارعين'; ?></span></a></li>
            <li><a href="#" data-page="farms"><i class="fas fa-tractor"></i><span><?php echo $texts[$lang]['farms'] ?? 'المزرعة'; ?></span></a></li>
            <li><a href="#" data-page="damage"><i class="fas fa-exclamation-triangle"></i><span><?php echo $texts[$lang]['damage_form'] ?? 'استمارة الضرر'; ?></span></a></li>
            <li><a href="#" data-page="docs"><i class="fas fa-file-alt"></i><span><?php echo $texts[$lang]['docs'] ?? 'التوثيق'; ?></span></a></li>
            <li><a href="#" data-page="reports"><i class="fas fa-chart-line"></i><span><?php echo $texts[$lang]['reports'] ?? 'التقارير'; ?></span></a></li>
        </ul>
    </div>

    <!-- المحتوى الرئيسي -->
    <div class="main-content" id="content">
        <button class="toggle-sidebar">☰</button>
        <h2><?php echo $texts[$lang]['welcome_dashboard'] ?? 'مرحباً بك في لوحة التحكم'; ?>, <?php echo htmlspecialchars($_SESSION['user_name'] ?? $_SESSION['user_email']); ?></h2>
        <div class="card">
            <h3><?php echo $texts[$lang]['farmers'] ?? 'المزارعين'; ?></h3>
            <p>هنا يمكنك إدارة جميع بيانات المزارعين.</p>
        </div>
        <div class="card">
            <h3><?php echo $texts[$lang]['farms'] ?? 'المزرعة'; ?></h3>
            <p>هنا يمكنك إدارة بيانات المزارع والمناطق الزراعية.</p>
        </div>
        <div class="card">
            <h3><?php echo $texts[$lang]['damage_form'] ?? 'استمارة الضرر'; ?></h3>
            <p>إدارة جميع استمارات الأضرار والتقارير.</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {

        const contentDiv = document.getElementById('content');
        const sidebarLinks = document.querySelectorAll('.sidebar a');
        const toggleBtn = document.querySelector('.toggle-sidebar');

        let currentCSS = null;
        let currentJS = null;

        function loadPage(page, addToHistory = true) {
            fetch('pages/' + page + '.php')
                .then(res => res.text())
                .then(html => {
                    contentDiv.innerHTML = html;
                    setActiveLink(page);

                    // تحميل CSS الخاص بالصفحة
                    if (currentCSS) currentCSS.remove();
                    const cssLink = `pages/${page}.css`;
                    fetch(cssLink, {method: 'HEAD'})
                        .then(resp => {
                            if (resp.ok) {
                                currentCSS = document.createElement('link');
                                currentCSS.rel = 'stylesheet';
                                currentCSS.href = cssLink;
                                document.head.appendChild(currentCSS);
                            }
                        });

                    // تحميل JS الخاص بالصفحة
                    if (currentJS) currentJS.remove();
                    const jsLink = `pages/${page}.js`;
                    fetch(jsLink, {method: 'HEAD'})
                        .then(resp => {
                            if (resp.ok) {
                                currentJS = document.createElement('script');
                                currentJS.src = jsLink;
                                document.body.appendChild(currentJS);
                            }
                        });

                    // تحديث History
                    if (addToHistory) {
                        history.pushState({page: page}, '', '?page=' + page);
                    }
                })
                .catch(err => {
                    contentDiv.innerHTML = '<p>حدث خطأ أثناء تحميل المحتوى.</p>';
                    console.error(err);
                });
        }

        function setActiveLink(page) {
            sidebarLinks.forEach(l => l.classList.remove('active'));
            const activeLink = Array.from(sidebarLinks).find(l => l.dataset.page === page);
            if (activeLink) activeLink.classList.add('active');
        }

        sidebarLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const page = link.dataset.page;
                loadPage(page);
            });
        });

        toggleBtn.addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('collapsed');
        });

        window.addEventListener('popstate', e => {
            const page = e.state?.page || 'dashboard';
            loadPage(page, false);
        });

        const urlParams = new URLSearchParams(window.location.search);
        const initialPage = urlParams.get('page') || 'dashboard';
        loadPage(initialPage, false);

    });
    </script>
</body>
</html>
