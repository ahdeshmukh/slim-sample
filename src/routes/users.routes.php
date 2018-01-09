<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//require '../src/services/database.service.php';
require '../src/services/user.service.php';

$app = new \Slim\App;

//Get all users
$app->get('/api/users', function(Request $request, Response $response) {
	//echo 'Users';
	$userService = new UserService();
	$userService->getUsers();
});

$app->get('/api/user/{id}', function(Request $request, Response $response) {
	//echo 'Users';
	$id = $request->getAttribute('id');
	$userService = new UserService();
	$userService->getUserById($id);
});