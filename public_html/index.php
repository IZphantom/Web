<?php

/**
 * @var $page base\Page
 * @var $routing base\routing\Routing
 */

require_once "../app/autoload.php";

session_start();

$page = new base\Page();
$app = new base\App($page, $routing);

$app->run();
$page->generate();