<?php

require 'database.service.php';

class UserService {
	
	private $dbService;
	
	public function __construct() {
		try {
			$this->dbService = new DatabaseService();
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getUsers() {
		try {
			$query = 'SELECT id, first_name, last_name, email FROM users';
			$users = $this->dbService->getResults($query);
			var_dump($users);
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
	
	public function getUserById($id) {
		try {
			$query = 'SELECT id, first_name, last_name, email FROM users WHERE id = :id';
			$user = $this->dbService->getResults($query, array(':id' => $id));
			var_dump($user);
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}

	
}