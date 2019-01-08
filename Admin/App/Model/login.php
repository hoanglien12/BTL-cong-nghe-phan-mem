<?php
namespace LoginModelNS;
require 'App/Lib/dbDriverPDO.php';
use dbDriverPDONS\dbDriverPDO;
use \PDO;
/**
* 
*/
class LoginModel extends dbDriverPDO
{
	private $_data = array();
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public function checkLoginAdmin($username, $password){
		$sql = "SELECT * FROM admin AS a WHERE a.username = :username AND a.password = :password LIMIT 1";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(':username',$username,PDO::PARAM_STR);
			$stmt->bindParam(':password',$password,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->_data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}
}

?>