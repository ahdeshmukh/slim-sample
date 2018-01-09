<?php

require './database.service.php';

class SlimCommonService {
	
	private $pdo;
	private $stmt;
	
	private $dbService;
	
	public function __construct() {
		$this->dbService = new DatabaseService();
	}
	
	public function selectQuery($query, $params = array()) {
		
	}

	
}