<?php 
namespace DBNS;
use \PDO;
/**
* 
*/
class Database
{
	protected $db;
	function __construct()
	{
		$this->db = $this->connection();
	}

	public function connection(){
		try{
			$conn = new PDO('mysql:host=localhost;dbname=monthaydu;charset=utf8','root','');
			return $conn;
		}
		catch(PDOException $e){
			print_r($e->getMessage());
		}
	}

	public function disconnection(){
		$this->db = null;
	}

	function __destruct(){
		$this->disconnection();
	}
}


?>