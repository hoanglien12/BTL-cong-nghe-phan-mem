<?php 
namespace cartModelNS;
require "Application/libs/dbDriverPDO.php";
use dbDriverPDONS\dbDriverPDO;
use \PDO;
/**
* 
*/
class Cart_model extends dbDriverPDO
{
	private $_data=array();
	private $_flag=false;
	function __construct()
	{
		parent:: __construct();
	}
	public function getInfoDataProduct($id){
		$sql = "SELECT * FROM products AS a INNER JOIN category AS b ON a.id_cat = b.id_cat WHERE a.status = 1 AND a.id_pro = :id_pro LIMIT 1";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(':id_pro',$id,PDO::PARAM_INT);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->_data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}

	
	public function addOrderCustomer($table,$data){
		if ($this->insert($table,$data)) {
			$this->_flag=true;
		}
		return $this->_flag;
	}
}
?>