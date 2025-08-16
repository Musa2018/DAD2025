<?php
session_start();

// تبديل اللغة
if ($_SESSION['lang'] === "ar") {
    $_SESSION['lang'] = "en";
} else {
    $_SESSION['lang'] = "ar";
}

// حفظ الاختيار في كوكي لمدة سنة
setcookie("lang", $_SESSION['lang'], time() + (365 * 24 * 60 * 60), "/");

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
