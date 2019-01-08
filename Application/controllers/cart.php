<?php 

namespace CartControllerNS;
// session_start();
require "Application/core/My_Controller.php";
require "Application/models/cart_model.php";
use My_ControllerNS\My_Controller;
use cartModelNS\Cart_model;
/**
* 
*/
class Cart extends My_Controller
{
	
	function __construct()
	{
		//parent::__construct();
		$this->cart_model = new Cart_model();
	}
	public function addCart(){
		$idPd = $_GET['id'] ?? '';
		$idPd = is_numeric($idPd) ? $idPd : 0;
		$infoPd = $this->cart_model->getInfoDataProduct($idPd);
		if (empty($infoPd)) {
			header('Location:?c=home');
		}else{
			//kiem tra xem gio hang co ton tai khong
			//chua ton tai gio hang,day la lan dau tien cho sp vao gio hang
			$qty = $_POST['qtyPd'] ?? '';
			$qty = is_numeric($qty) ? $qty : 1;
			if (!isset($_SESSION['cart'])) {
				//THEM vao gio hang 
				//id_prod có thể tùy đặt
				$_SESSION['cart'][$idPd]['id_prod'] = $infoPd['id_pro'];
				$_SESSION['cart'][$idPd]['name_prod'] = $infoPd['name_pro'];
				$_SESSION['cart'][$idPd]['img_prod'] = $infoPd['img_pro'];
				$_SESSION['cart'][$idPd]['price'] = $infoPd['price'];
				$_SESSION['cart'][$idPd]['qty_pd'] = $qty;
			}else{
				//kiem tra san pham ma nguoi dung muon them vao gio hang da ton tai hay chua?
				//neu chua thi thao tac nhu ben tren
				//neu co roi thi cap nhat so luong cua no trong gio hang chu k them nua
				if (isset($_SESSION['cart'][$idPd]['id_prod']) && $_SESSION['cart'][$idPd]['id_prod'] == $idPd) {
					//da ton tai san pham trong gio hang
					$_SESSION['cart'][$idPd]['qty_pd'] += $qty;
				}else{
					$_SESSION['cart'][$idPd]['id_prod'] = $infoPd['id_pro'];
					$_SESSION['cart'][$idPd]['name_prod'] = $infoPd['name_pro'];
					$_SESSION['cart'][$idPd]['img_prod'] = $infoPd['img_pro'];
					$_SESSION['cart'][$idPd]['price'] = $infoPd['price'];
					$_SESSION['cart'][$idPd]['qty_pd'] = $qty;
				}
			}
			header('Location:?c=cart&m=index');
		}
	}
	public function index(){
		
		$dataCart = $_SESSION['cart'] ?? array();
		$mess = $_GET['state'] ?? '';
		
		$header = array();
		$header['title'] ="This is Cart";
		$header['content'] ="This is Cart";
		$this->loadHeader($header);
		require 'Application/views/cart/index_view.php';
		
		$this->loadFooter();
	}
	public function delete(){
		if (isset($_SESSION['cart'])) {
			unset($_SESSION['cart']);
		}
		header('Location:?c=cart&m=index');
	}
	public function remove(){
		$idCart=$_GET['id'] ?? '';
		$idCart = is_numeric($idCart) ? $idCart : 0;
		if (isset($_SESSION['cart'][$idCart])) {
			unset($_SESSION['cart'][$idCart]);
		}
		header('Location:?c=cart&m=index');
	}
	public function update(){
		if (isset($_POST['btnSubmit'])) {
			$qtyCart = $_POST['txtQTY'] ?? array();
			foreach ($qtyCart as $key => $value) {
				//kiem tra san pham co ton tai trong gio hang hay k
				if (isset($_SESSION['cart'][$key]) && $value<10) {
					$_SESSION['cart'][$key]['qty_pd'] = $value;
				}
			}
			header('Location:?c=cart&m=index');
		}
	} 
	public function order(){
		if (isset($_POST['buyNow'])) {
			$fullname = $_POST['txtFullname'] ?? '';
			$fullname = strip_tags($fullname);

			$email = $_POST['email'] ?? '';
			$email = strip_tags($email);

			$address = $_POST['txtAddress'] ?? '';
			$address = strip_tags($address);

			$phone = $_POST['txtPhone'] ?? '';
			$phone = strip_tags($phone);

			$note = $_POST['txtNote'] ?? '';
			$note = strip_tags($note);

			//BTVN :validate
			if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
				$flagAdd=false;
				foreach ($_SESSION['cart'] as $key => $cart) {
					$qtyProducts = $cart['qty_pd'];
					$money = $cart['qty_pd'] * $cart['price'];
					$idProducts = $cart['id_prod'];
					$data=array(
						'id_product' => $idProducts,
						'name_customer' => $fullname,
						'email_customer' => $email,
						'address_customer' => $address,
						'note_customer' => $note,
						'qty_product' => $qtyProducts,
						'money' => $money,
						'status' => 0,//doi xu ly
						'create_time'=> date('Y-m-d H:i:s'),
						'update_time'=>''
					);
					$add = $this->cart_model->addOrderCustomer('orders',$data);
					if($data){
						$flagAdd=true;
					}
				}
				if ($flagAdd==true) {
					unset($_SESSION['cart']);
					header('Location:?c=cart&m=index&state=success');
				}else{
					header('Location:?c=cart&m=index&state=err');

				}
			}else{
				header('Location:?c=cart&m=index&state=fail');
			}
		}
	}
}
$method = $_GET['m'] ?? 'index';
$obj = new Cart();
$obj->$method();
?>