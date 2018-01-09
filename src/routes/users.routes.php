<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../src/services/user.service.php';

$app = new \Slim\App;

//Get all users
$app->get('/api/users', function(Request $request, Response $response) {
	$userService = new UserService();
	return $userService->getUsers();
});

//Get user by id
$app->get('/api/user/{id}', function(Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$userService = new UserService();
	return $userService->getUserById($id);
});