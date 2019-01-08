<?php
namespace CategoryNS;

require "App/Core/MyController.php";
require "App/Model/ProductModel.php";

use MyControllerNS\MyController;
use ProductModelNS\ProductModel;

class Category extends MyController
{
	private $_objProductModel;
	function __construct()
	{
		# code...
		parent::__construct();
		$this->_objProductModel = new ProductModel();
	}
	public function index(){
		$data = $this->_objProductModel->getAllData('category');
		// echo "<pre>";var_dump($data);die;
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/category/index_view.php';
		$this->loadFooter();
	}

	public function add(){
		$dataCate = $this->_objProductModel->getAllData('category');
		// echo "<pre>";var_dump($dataCate[0]['parent_id']);die;
		$this->loadHeader();
		$this->loadSideBar();
		require 'App/View/category/add_view.php';
		$this->loadFooter();
	}

	public function handle(){
		$nameCat = $_POST['txtNameCat'] ?? '';
		$nameCat = strip_tags($nameCat);
		$parentId = $_POST['slcParentCat'] ?? '';
		$parentId = strip_tags($parentId);
		if($nameCat == '' || $parentId == ''){
			echo 'vui long dien day du thong tin';
		}

		$arrInput = array(
			'name_cat' => $nameCat,
			'created_time' => date('Y-m-d H:i:s'),
			'update_time' => ''
		);

		$update = $this->_objProductModel->insertCategory('category',$arrInput);
		if($update){
			header('location:?c=category');
		}else{
			header('location:?c=category&m=fail');
		}
	}

	public function edit(){
		$this->loadHeader();
		$this->loadSideBar();
		$idCat = $_GET['id'] ?? 0;
		$infoCat = $this->_objProductModel->findDataByID('category',$idCat);
		// echo "<pre>";var_dump($infoCat);die;
		require 'App/View/category/edit_view.php';
		$this->loadFooter();
	}

	public function delete(){
		$idCat = $_GET['id'] ?? 0;
		$delete = $this->_objProductModel->delete('category',$idCat);
		if($delete){
			
			header('location:?c=category');
		}else{
			header('location:?c=category&mess=fail');
		}
	}

	public function handleEdit(){
		$idCat = $_POST['hddIdCat'] ?? '';
		$idCat = is_numeric($idCat) ? $idCat : 0;

		$nameCat = $_POST['txtNameCat'] ?? '';
		$nameCat = strip_tags($nameCat);

		$hddCat = $_POST['hiddenNameCat'] ?? '';
		$hddCat = strip_tags($hddCat);

		$status = $_POST['slcStatusCat'] ?? '';
		$status = ($status == 0 OR $status == 1) ? $status : 0;

		if ($nameCat !== $hddCat) {
			
				$dataEdit = array(
					'name_cat' => $nameCat,
					'status' => $status,
					'update_time' => date('Y-m-d H:i:s')
				);
				$edit = $this->_objProductModel->update('category',$dataEdit,$idCat);
				if ($edit) {
					header('Location:?c=category&m=index');
				}else{
					header('Location:?c=category&m=edit&state=bad&id='.$idCat);
				}
			
		}else{
			$dataEdit = array(
					'name_cat' => $nameCat,
					'Status' => $status,
					'update_time' => date('Y-m-d H:i:s')
				);
			$edit = $this->_objProductModel->update('category',$dataEdit,$idCat);
			if ($edit) {
				header('Location:?c=category&m=index');
			}else{
				header('Location:?c=category&m=edit&state=bad&id='.$idCat);
			}
		}
	}

}
$method = $_GET['m'] ?? 'index';
$obj = new Category();
$obj->$method(); 
?>