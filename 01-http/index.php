<?php

include 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$request = Request::createFromGlobals();
$path = $request->getPathInfo(); // the URI path being requested
if (in_array($path, array('', '/'))) {
	$response = new Response('Welcome to the homepage.');
} elseif ($path == '/contact') {
	$response = new Response('Contact us');
} else {
	$response = new Response('Page not found.', 404);
}

$initialContent = $response->getContent();

$pageContent = "<h1>$initialContent</h1>";
$pageContent .= "links:";
$pageContent .= " <a href='/'>home</a>";
$pageContent .= " <a href='/contact'>contact</a>";
$pageContent .= " <a href='/non-existent-page'>non-existent-page</a>";
$response->setContent($pageContent);
$response->send();