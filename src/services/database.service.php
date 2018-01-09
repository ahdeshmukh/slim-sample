<?php

require '../src/interfaces/slim-database.interface.php';

class DatabaseService implements iSlimDatabase {
	
	private $pdo;
	private $stmt;
	
	public function __construct() {
		$this->connect();
	}
	
	public function connect() {
		$host = '127.0.0.1';
		$db   = 'test';
		$user = 'root';
		$pass = 'password';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
			$this->pdo = new PDO($dsn, $user, $pass, $opt);
		} catch(Exception $e) {
			throw new Exception($e);
		}
	}
	
	public function executeQuery($query, $params=array()) {
		try {
			$this->stmt = $this->pdo->prepare($query);
			foreach ($params as $key => $value) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_INT;
						break;
					default:
						$type = PDO::PARAM_STR;
						break;
				}
				$this->stmt->bindValue($key, $value, $type);
			}
			$this->stmt->execute();
		} catch (Exception $e) {
			/*$this->stmt = false;
			if ($this->show_db_error) {
				echo $e->getMessage();
			}*/
			throw new Exception($e);
		}
	}
	
	public function getResults($query, $params=array()) {
		try {
			$this->executeQuery($query, $params);
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			/*$this->stmt = false;
			if ($this->show_db_error) {
				echo $e->getMessage();
			}*/
			throw new Exception($e);
		}
	}
	
	public function getResult($query, $params=array()) {
		try {
			$this->executeQuery($query, $params);
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			/*$this->stmt = false;
			if ($this->show_db_error) {
				echo $e->getMessage();
			}*/
			throw new Exception($e);
		}
	}
	
}