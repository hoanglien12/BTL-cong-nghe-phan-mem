<?php
namespace homeControllerNS;
require 'App/Core/MyController.php';
require 'App/Model/ProductModel.php';
use MyControllerNS\MyController;
use ProductModelNS\ProductModel;
class homeController extends MyController{
	public function index(){
		
		$this->loadHeader();
		$this->loadSideBar();
		$objModel = new ProductModel();
		$dataAllProduct = $objModel->getAllData();
		require 'App/View/home/home_index.php';
		$this->loadFooter();
		// require 'Admin/View/home/home_index.php';
	}
}
$objModel = $_GET['m'] ?? 'index';
$obj = new homeController();
$obj->$objModel();
// co hieu tai sao no chay dc nhu the kkhong,khong hieu cho naosao no vao dc dayoh hieu chuaroiak
