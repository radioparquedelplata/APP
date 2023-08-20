<?php 
  
     function APIURL()
	 {
		 
		 if(!isset($_REQUEST['set']) || empty($_REQUEST['set'])) :
		 throw new Exception("please set Request for data");
		 elseif(!function_exists($_REQUEST['set'])) :
		 throw new Exception("invalid Request set");
		 else : 
		      echo $_REQUEST['set']();
		 endif;
	 }

     try
	 {
		 APIURL();
	 }
     catch(Exception $e)
	 {
		 echo $e->getMessage();
	 }
?>