<?php
namespace dbDriverPDONS;
use \PDO;
require 'App/Config/database.php';
use DBNS\Database;
/**
*  
*/
class dbDriverPDO extends Database
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	
}

?>