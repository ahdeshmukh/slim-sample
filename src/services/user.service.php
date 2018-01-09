<?php

require 'database.service.php';
require 'slim-common.service.php';

class UserService extends SlimCommonService {
	
	private $dbService;
	
	public function __construct() {
		try {
			$this->dbService = new DatabaseService();
		} catch(Exception $e) {
			return $this->returnError($e->getMessage());
		}
	}
	
	public function getUsers() {
		try {
			$query = 'SELECT id, first_name, last_name, email FROM users';
			$users = $this->dbService->getResults($query);
			return $this->returnJSON($users);
		} catch (Exception $e) {
			return $this->returnError($e->getMessage());
		}

	}
	
	public function getUserById($id) {
		if(!is_numeric($id)) {
			return $this->returnError('Id should be a valid integer');
		}
		try {
			$query = 'SELECT id, first_name, last_name, email FROM users WHERE id = :id';
			$user = $this->dbService->getResult($query, array(':id' => $id));
			return $this->returnJSON($user);
		} catch (Exception $e) {
			return $this->returnError($e->getMessage());
		}

	}

	
}