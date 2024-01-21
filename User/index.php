<?php
include('components/header.php');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'news') {
        include('page/news.php');
    } elseif ($page == 'accommodation') {
        echo $page;
    } elseif ($page == 'products') {
        echo $page;
    } elseif ($page == 'tourist_spot') {
        include('page/ts.php');
    } elseif ($page == 'restaurant') {
        echo $page;
    } elseif ($page == 'hotline') {
        include('page/contacts.php');
    } else {
        header('Location: index.php?page=news');
        exit;
    }
} else {
    header('Location: index.php?page=news');
    exit;
}
include('components/footer.php');