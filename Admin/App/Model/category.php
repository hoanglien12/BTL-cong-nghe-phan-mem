<?php 

namespace CategoryModelNS;
require 'App/Lib/dbDriverPDO.php';
use dbDriverPDONS\dbDriverPDO;
use \PDO;
/**
* 
*/
class CategoryModel extends dbDriverPDO
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
}

?>