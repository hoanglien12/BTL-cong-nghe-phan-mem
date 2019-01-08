<?php
class Router{
	public function login(){
		require 'App/Controller/login.php';
	}
 	public function home(){
 		require 'App/Controller/homeController.php';
 	}
 	public function dashboard(){
 		require 'App/Controller/dashboard.php';
 	}

 	public function category(){
 		require 'App/Controller/category.php';
 	}
 	public function product(){
 		require 'App/Controller/product.php';
 	}
 	public function users(){
 		require 'App/Controller/users.php';
 	}
 	public function __call($param, $method){
 		echo 'trang ban nhap k co';
 	}
 	public function cart(){
 		require 'App/Controller/cart.php';
 	}
}
$objController = $_GET['c'] ?? 'login';
$obj = new Router();
$obj->$objController();

// neu nhap vao duong link nhua kia roi enter thi no se chay vao function home dung k
// ['c'] la phuong thuc ngam minh truyen len router toi,c ngam hieu la controller ,m laf model
// nhin a nhap vao duong linh nhe,neu ma minhf nhap vao duong link nhu kia thi no se chaty vao cai function product
// neu nhap vao la demo nhu a vua nhap thi no bao loi,boi bi trong class router k co phuong thuc day,hieu k