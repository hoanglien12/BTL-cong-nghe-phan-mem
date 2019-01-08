<?php
namespace UserModelNS;
require 'App/Lib/dbDriverPDO.php';
use dbDriverPDONS\dbDriverPDO;
use \PDO;

/**
* 
*/
class UserModel extends dbDriverPDO
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	
}


?>