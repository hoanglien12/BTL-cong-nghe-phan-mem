<?php

namespace MyControllerNS;
class MyController{
	function __construct(){
		
	}
	public function loadHeader(){
		require 'App/View/partials/header_view.php';
	}

	public function loadSideBar(){
		$name = $_GET['c'] ?? '';
		require 'App/View/partials/sidebar_view.php';
	}

	public function loadFooter(){
		require 'App/View/partials/footer_view.php';
	}
}