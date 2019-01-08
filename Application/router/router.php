<?php 
class Router{
	public function home(){
		require 'Application/controllers/home.php';
	}
	public function product(){
		require 'Application/controllers/product.php';
	}
	public function cart(){
		require 'Application/controllers/cart.php';
	}
	public function __call($method,$param){
		echo "Rất tiếc không tìm thấy yêu cầu của bạn!!";
	}
}
$controller = $_GET['c'] ?? 'home';
$obj = new Router();
$obj->$controller();
?>