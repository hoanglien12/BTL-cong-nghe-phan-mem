<?php
namespace ProductModelNS;
require 'App/Config/database.php';
use DBNS\Database;
use \PDO;
class ProductModel extends Database{
	private $_data = array();
	private $_flag = false;
	function __construct(){
		parent::__construct();
	}
	public function getAllData($table){
		$sql = "SELECT * FROM {$table}";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}
	public function insertCategory($table, $arrData){
		$filedColumns = '';//key nam trong columns db
		$filedParams = '';//tham số ảo truyền vào câu lệnh sql
		foreach ($arrData as $key => $val) {
			$filedColumns .= ($filedColumns == '') ? $key : ',' . $key;
			$filedParams .= ($filedParams == '') ? ':' .$key : ',:'.$key;
		}
		$sql = "INSERT INTO {$table} ({$filedColumns}) VALUES ({$filedParams})";
		//sql = "INSERT INTO admin (username,password) VALUES (:username, :password)"
		$stmt = $this->db->prepare($sql);
		if($stmt){
			//kiểm tra các tham số ảo nếu có
			foreach ($arrData as $k => &$v) {
				$stmt->bindParam(":{$k}",$v,PDO::PARAM_STR);
			}
			//thuc thi cau lenh
			if ($stmt->execute()) {
				$this->_flag = TRUE;
			}
			$stmt->closeCursor();
		}
		return $this->_flag;
	}
	private function _getPrimaryKeyTable($table){
		$data= array();
		$sql = "SHOW KEYS FROM {$table} WHERE Key_name = 'PRIMARY'";
		//kiểm tra xem cú pháp sql có đúng không
		//$stmt trả về true thì k có lỗi gì
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
				//kiểm tra các tham số truyền vào câu lệnh sql(nếu có)
			//thực hiện câu lệnh sql
			//nếu hàm này trả về true nghĩa là thực hiện truy vẫn sql thành công
			if ($stmt->execute()) {
				//kiểm tra xem có dòng dữ liệu nào được trả về hay k?
				if ($stmt->rowCount() >0) {
					$data= $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}
	public function findDataByID($table,$id){
		$primaryKey = $this->_getPrimaryKeyTable($table);
		$idKey = $primaryKey['Column_name'];
		$sql = "SELECT * FROM {$table} WHERE {$idKey} = :{$idKey}";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":{$idKey}",$id,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->_data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}
	public function delete($table, $id){
		$primaryKey = $this->_getPrimaryKeyTable($table);
		$idKey = $primaryKey['Column_name'];
		$sql = "DELETE FROM {$table} WHERE {$idKey} = :{$idKey}";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":{$idKey}",$id,PDO::PARAM_STR);
			$checkDelete = $this->findDataByID($table,$id);
			if (!empty($checkDelete))
			{
				if ($stmt->execute()) {
				$this->_flag = TRUE;
			}
			}
			
			$stmt->closeCursor();
		}
		return $this->_flag;
	}
	public function update($table,$data,$id){
		$filedParams = '';
		$primaryKey = $this->_getPrimaryKeyTable($table);
		$idKey = $primaryKey['Column_name'];
		foreach ($data as $key => $value) {
			$filedParams .= ($filedParams == '') ? $key . "= :{$key}" : ",".$key ."= :{$key}";
		}
		$sql = "UPDATE {$table} SET {$filedParams} WHERE {$idKey} = :{$idKey}";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			foreach ($data as $k => &$v) {
				$stmt->bindParam(":{$k}",$v,PDO::PARAM_STR);
			}
			$stmt->bindParam(":{$idKey}",$id,PDO::PARAM_STR);
			$checkUpdate = $this->findDataByID($table,$id);
			if(!empty($checkUpdate))
			{
				if ($stmt->execute()) {
					$this->_flag = TRUE;
				}
			}
			$stmt->closeCursor();
		}
		return $this->_flag;
	}
	
	 
}