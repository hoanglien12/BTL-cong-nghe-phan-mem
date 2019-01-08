<?php
namespace HomeNS;
require 'Application/models/home.php';
require 'Application/core/My_Controller.php';
use HomeModelNS\HomeModel;
use My_ControllerNS\My_Controller;

/**
* 
*/
class Home extends My_Controller
{
	
	// function __construct()
	// {
	// 	parent::__construct();
	// }
	public function index(){
		// if(isset($_SESSION['cart'])){
		// 	echo 1;die;
		// 	echo "<pre>";var_dump($_SESSION);die;
		// }
		$obj = new HomeModel();
		$dataProduct = $obj->getAllData('products');

		
		$this->loadHeader('this is home');

		$this->loadSideBar();

		require 'Application/views/product/index_view.php';

		$this->loadFooter();
	}

	public function vongco(){
		$obj = new HomeModel();
		$dataProduct = $obj->getAllData('products');

		$this->loadHeader('vong co');

		$this->loadSideBar();

		require 'Application/views/product/sidebar_view.php';

		$this->loadFooter();

	}

}
$method = $_GET['m'] ?? 'index';
$obj = new Home();
$obj->$method();
?>