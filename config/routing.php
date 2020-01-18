<?php


use base\routing\Routing;

$routing = new Routing();

$routing->add('POST', '/person/get/', 'common',SiteController::class, 'personGet');
$routing->add('POST', '/person/getAll/', 'common',SiteController::class, 'personGetAll');

$routing->add('POST', '/address/get/', 'common',SiteController::class, 'addressGet');
$routing->add('POST', '/address/getAll/', 'common',SiteController::class, 'addressGetAll');

$routing->add('POST', '/person/create/', 'common',SiteController::class, 'personCreate');
$routing->add('POST', '/person/delete/', 'common',SiteController::class, 'personDelete');
$routing->add('POST', '/person/update/', 'common',SiteController::class, 'personUpdate');
$routing->add('POST', '/person/search/', 'common',SiteController::class, 'personSearch');