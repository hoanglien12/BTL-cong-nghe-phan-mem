<?php 
namespace dbNS;
use \PDO;
class Database{
	//tạo biến kết nối
	protected $db;
	//khởi tao kết nối
	function __construct(){
		$this->db = $this->connection();
	}
	public function connection(){
		try{
			$con = new PDO('mysql:host=localhost;dbname=monthaydu;charset=utf8','root','');
			return $con;
		}catch(PDOException $e){
			print_r($e->getMessage());
		}
		
	}
	//đóng kết nối
	protected function disconnection(){
		$this->db = null;
	}
	function __destruct(){
		$this->disconnection();
	}
	
}
?>