<?php
namespace UserNS;

require "App/Core/MyController.php";

use MyControllerNS\MyController;
/**
* 
*/
class User extends MyController 
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	public function index(){
		$this->loadHeader();
		//load sidebar
		$this->loadSideBar();
		//load content
		require "App/View/user/user_view.php";
		//load footer
		$this->loadFooter();
	}
	public function __call($method, $param){
		echo "Không tìm thấy yêu cầu!";
	}
}
$method = $_GET['m'] ?? 'index';
$obj = new User();
$obj->$method();

?>