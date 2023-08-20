<?php 
unset($_REQUEST['G_ENABLED_IDPS'],$_REQUEST['PHPSESSID']);  
class db 
{
	   protected $db;
	   protected static $dbs;
	   function __construct()
	   {
		      require_once "../system/constant.php";	
		      $mysqli = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			  $mysqli -> set_charset("utf8");
		      $this->db  = $mysqli;
		     
	   }
}

?>