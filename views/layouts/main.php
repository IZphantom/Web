<?php

/**
 * @var $page base\Page;
 */

$path = new base\routing\Path();
?>

<!doctype html>
<html lang="ru">

<head>
    <?php include $page->getScripts(); ?>
    <?php include $page->getMeta(); ?>
    <?php include $page->getStyles(); ?>
    <title><?= $page->getTitle(); ?></title>
    <meta name="description" content="<?= $page->getDescription(); ?>">
    <meta name="keywords" content="<?= $page->getKeywords(); ?>">
</head>

<body>
    <div class="body">
        <header class="header">
            <?php include $page->getHeader(); ?>
        </header>

        <div class="content">
            <?php
            if (!empty($page->getData()))
                extract($page->getData());

            if (!empty($page->getContent()))
                echo $page->getContent();
            ?>
        </div>

        <footer>
            <?php include $page->getFooter(); ?>
        </footer>
    </div>
</body>

</html>