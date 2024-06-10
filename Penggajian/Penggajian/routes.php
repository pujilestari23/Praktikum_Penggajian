<?php

if (isset($_GET["page"])){
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "bagian":
        include "pages/bagian/bagian.php";
        break;
    case "bagiantambah":
        include "page/bagian/bagiantambah.php";
        break;
    case "bagianhapus":
        include "page/bagian/bagianhapus.php";
        break;
    case "bagianubah":
        include "page/bagian/bagianubah.php";
        break;
    default:
        include "pages/404.php";
}