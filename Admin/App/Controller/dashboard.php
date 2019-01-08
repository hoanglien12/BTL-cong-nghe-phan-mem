<?php
namespace dashboardNS;
require 'App/Core/MyController.php';
use MyControllerNS\MyController;
/**
* 
*/
class Dashboard extends MyController
{
	
	// function __construct(){
	// 	parent:: __construct();
	// }
	public function index(){
		
		$header = array();
		$header['title'] = 'This is Dashboard';
		$header['content'] = "this this Dashboard";
		$this->loadHeader($header);
		//load sidebar
		$this->loadSideBar();
		//load content
		require "App/View/dashboard/index_view.php";
		//load footer
		$this->loadFooter();
	}
	public function __call($method, $param){
		echo "Không tìm thấy yêu cầu!";
	}
}
$method = $_GET['m'] ?? 'index';
$obj = new Dashboard();
$obj->$method();

?>