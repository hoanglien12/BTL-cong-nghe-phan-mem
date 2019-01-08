<?php 

namespace My_ControllerNS;
session_start();
require "Application/configs/constant.php";


class My_Controller
{
	protected function loadHeader($header = array()){	
		// echo "<pre>";var_dump($_SERVER['HTTP_HOST']);die;
		$rootProject = getcwd();
		$nameProject = explode('\\',$rootProject);
		$namePro = end($nameProject);
		$urlCart = $_SERVER['HTTP_HOST'].'/'.$namePro;
		$title = $header['title'] ?? '';
		$content = $header['content'] ?? '';
		$product = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

		require "Application/views/partials/header_view.php";
	}
	protected function loadSideBar(){
		$module = $_GET['c'] ?? '';
		require "Application/views/partials/sidebar_view.php";

	}
	protected function loadFooter(){
		require "Application/views/partials/footer_view.php";
	}
}
?>