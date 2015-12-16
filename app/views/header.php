<!DOCTYPE html>
<html>
    <head>
        <link href="/mvc/public/css/<?php print($theme)?>" rel="stylesheet"/>
        <link href="/mvc/public/css/styles.css" rel="stylesheet"/>
        <?php if (isset($title)): ?>
            <title>News: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>News</title>
        <?php endif ?>
        <script src="/mvc/public/js/jquery.min.js"></script>
        <script src="/mvc/public/js/scripts.js"></script>
    </head>
    <body>
    <div class="container-fluid">
    <div id="top">
        <img src="/mvc/public/uploads/<?php print($banner)?>" alt="banner" class="banner">
    </div>
    </div>
        <div class="container">
            <div id="middle">
