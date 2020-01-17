<?php


use base\routing\Routing;

$routing = new Routing();

$routing->add('POST', '/person/get/', 'common',SiteController::class, 'personGet');
$routing->add('POST', '/person/getAll/', 'common',SiteController::class, 'personGetAll');

$routing->add('POST', '/adress/get/', 'common',SiteController::class, 'adressGet');
$routing->add('POST', '/adress/getAll/', 'common',SiteController::class, 'adressGetAll');

$routing->add('POST', '/phone/get/', 'common',SiteController::class, 'phoneGet');
$routing->add('POST', '/phone/getAll/', 'common',SiteController::class, 'phoneGetAll');

$routing->add('POST', '/mail/get/', 'common',SiteController::class, 'mailGet');
$routing->add('POST', '/mail/getAll/', 'common',SiteController::class, 'mailGetAll');

$routing->add('POST', '/name/get/', 'common',SiteController::class, 'nameGet');
$routing->add('POST', '/name/getAll/', 'common',SiteController::class, 'nameGetAll');


