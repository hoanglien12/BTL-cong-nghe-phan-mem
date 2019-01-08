<?php
namespace ProductNS;
require "App/Core/MyController.php";
require "App/Model/ProductModel.php";

use MyControllerNS\MyController;
use ProductModelNS\ProductModel;
/**
* 
*/
class Product extends MyController
{
	private $_objProductModel;
	function __construct()
	{

		parent::__construct();
		$this->_objProductModel = new ProductModel();
	}

	public function index(){
		$data = $this->_objProductModel->getAllData('products');
		// print_r($data);
		// die();
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/product/index_view.php';
		$this->loadFooter();
	}

	public function add(){
		$dataProduct = $this->_objProductModel->getAllData('category');
		 // echo "<pre>";var_dump($dataProduct[0]['parent_id']);die;
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/product/add_view.php';
		$this->loadFooter();
	}

	public function handleAdd(){
		// print_r($_POST);
		// die();
		$namePro = $_POST['txtNameProduct'] ?? '';
		$namePro = strip_tags($namePro);

		$imgFile = '';

		if (isset($_FILES['nameFile'])) {
			$imgFile = $this->uploadImages($_FILES['nameFile']);
		}
		$idCat = $_POST['slcCat'] ?? '';
		$idCat = strip_tags($idCat);

		$pricePro = $_POST['txtPrice'] ?? '';
		$pricePro = strip_tags($pricePro);

		
		if($namePro == '' || $idCat == '' || $pricePro == ''){
			echo 'vui long dien day du thong tin';
		}

		$arrInput = array(
			'name_pro' => $namePro,
			'id_cat' => $idCat,
			'price' => $pricePro,
			'status' => 1,
			'img_pro' => $imgFile,
			'create_time' => date('Y-m-d H:i:s'),
			'update_time' => ''
		);

		$update = $this->_objProductModel->insertCategory('products',$arrInput);
		if($update){
			header('location:?c=product');
		}else{
			header('location:?c=product&m=fail');
		}
	}

	public function uploadImages($file){
		//check file có lỗi hay k?
		if ($file['error'] == 0) {
			//không có lỗi
			$tmp_path=$file['tmp_name'];
			if (!empty($tmp_path)) {
				$nameFile = $file['name'];
				if (move_uploaded_file($tmp_path, 'D:\xampp\htdocs\thayDu\Admin\publics\img\\' . $nameFile)) {
					return $nameFile;
				}
			}
		}
		return FALSE;
	}
	public function fail(){
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/product/edit_error_view.php';
		$this->loadFooter();
	}

	public function edit(){
		$idPro = $_GET['id'] ?? 0;
		$infoPd = $this->_objProductModel->findDataByID('products',$idPro);
		$dataCat = $this->_objProductModel->getAllData('category');
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/product/edit_view.php';
		$this->loadFooter();
	}

	public function handleEdit(){
		if (isset($_POST['btnSubmit'])) {
			$idPd = $_GET['id'] ?? '';
			$idPd = (is_numeric($idPd) && $idPd > 0) ? $idPd : 0;

			$nameProduct = $_POST['txtNameProduct'] ?? '';
			$nameProduct = strip_tags($nameProduct);

			$hddNamePd = $_POST['hddNamePd'] ?? '';
			$hddNamePd = strip_tags($hddNamePd);

			$nameImg = $_POST['hddImage'] ?? '';
			if (isset($_FILES['nameFile'])) {
				if (!empty($_FILES['nameFile']['tmp_name'])) {
					$nameImg = uploadImages($_FILES['nameFile']);
				}
			}
			$catPd = $_POST['slcCat'] ?? '';
			$catPd = is_numeric($catPd) ? $catPd : '';

			$pricePd = $_POST['txtPrice'] ?? '';
			$pricePd = is_numeric($pricePd) ? $pricePd : '';

			$status = $_POST['slcStatus'] ?? '';
			$status = ($status == 1 OR $status ==0) ? $status : 0;

			//ve viet validate data
		    $data = array(
		    	'name_pro' => $nameProduct,
		    	'id_cat' => $catPd,
		    	'price' => $pricePd,
		    	'status' => $status,
		    	'img_pro' => $nameImg,
		    	'update_time' => date('Y-m-d H:i:s')
		    );
		    
		    $update = $this->_objProductModel->update('products',$data,$idPd);
		    if($update) {
		    	header('Location:?c=product&m=index&state=succ');
		    }else{
		    	header('Location:?c=product&m=edit&state=fail&id='.$idPd);
		    }
		    }
	}
	public function delete(){
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/product/index_view.php';
		$this->loadFooter();
	}

	// private function validateAddProduct($nameProduct,$desProduct,$imgFile,$cate,$price){
	// 	$error = array();
	// 	$error['name_pro'] = empty($nameProduct) ? 'Vui lòng nhập tên sản phẩm' : '';
	// 	$error['img_pro'] = empty($imgFile) ? 'Vui lòng nhập hình ảnh sản phẩm' : '';
	// 	$error['id_cat'] = empty($cate) ? 'Vui lòng chọn category cho sản phẩm' : '';
	// 	$error['price'] = empty($price) ? 'Vui lòng nhập giá cho sản phẩm' : '';
	// 	return $error;
	// }
}

$method = $_GET['m'] ?? 'index';
$obj = new Product();
$obj->$method();
?>