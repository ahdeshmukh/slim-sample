<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Get all users
$app->get('/api/users', function(Request $request, Response $response) {
	echo 'Users';
});