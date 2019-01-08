<?php 
namespace LoginControllerNS;
require 'App/Core/MyController.php';
require 'App/Model/login.php';
use MyControllerNS\MyController;
use LoginModelNS\LoginModel;
/**
* 
*/
class LoginController
{
	public function index(){
		require 'App/View/login/index_login.php';
	}

	public function handle(){
		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
		// var_dump($password);die;
		$objModel = new LoginModel();
		if($username == '' || $password == ''){
			echo 'Empty';
		}else{
			$data =  $objModel->checkLoginAdmin($username,md5($password));
			if(!empty($data) && isset($data['id'])){
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				// $_SESSION['id'] = $data['id'];
				echo 'OK';
			}else{
				echo 'FAIL';
			}
		}
		
	}
}


$method = $_GET['m'] ?? 'index';
$obj = new LoginController();
$obj->$method();
?>