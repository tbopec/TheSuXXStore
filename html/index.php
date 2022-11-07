<?php

/**
 * This code is part of the Suxx security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not meant to be used as an actual shop application or a
 * base for one.
 *
 * @author Arne Blankerts <arne.blankerts@thephp.cc>
 * @copyright 2011-2012 thePHP.cc - The PHP Consulting Company, Germany
 *
 */

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors',1);
define('DSN', 'mysql://root:root@mysql/suxx');

$url = parse_url($_SERVER['REQUEST_URI']);
$controller = explode('/', $url['path'])[2] ?? 'home';

require __DIR__ . '/autoload.php';
session_start();

$request  = new SuxxRequest($_REQUEST, $_SESSION);
$response = new SuxxResponse();
$factory  = new SuxxFactory();

$suxx = new SuxxFrontController($request, $response, $factory);
$view   = $suxx->execute($controller);

echo $view->render($request, $response);
