<!DOCTYPE html>

<html>

    <head>

        <link href="/mvc/public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/mvc/public/css/styles.css" rel="stylesheet"/>
        <link href="/mvc/public/css/pgwslider.min.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>News: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>News</title>
        <?php endif ?>

        <script src="/mvc/public/js/jquery.min.js"></script>
        <script src="/mvc/public/js/bootstrap.min.js"></script>
        <script src="/mvc/public/js/jquery.dotdotdot.min.js"></script>
        <script src="/mvc/public/js/pgwslider.min.js"></script>
        <script src="/mvc/public/js/typeahead.js"></script>
        <script src="/mvc/public/js/scripts.js"></script>
    </head>

    <body>
        <div class="container">
            <div id="top">
                
            </div>
            <div id="middle">
