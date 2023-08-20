<?php 

class load extends baseController{

	  function CountTable($set)
	  {
           $table = $set;        
           $query = $this->db->prepare("select * from ".$table."");
           $query->execute();
           return $query->rowCount();
	  }
	  
	  function GetApplistlimited($id){
		 $query = $this->db->prepare("select * from applist where user_id = '$id' order by id desc limit 5");
         $query->execute();
		 $val = $query->fetchAll();
		 return $val;
	 }
	  function GetApplistAll($id){
		 $query = $this->db->prepare("select * from applist where user_id = '$id' order by id desc");
         $query->execute();
		 $val = $query->fetchAll();
		 return $val;
	 }
	  function GetAdminSetting(){
		 $query = $this->db->prepare("select * from admin where id =1");
         $query->execute();
		 $val = $query->fetchAll();
		 return $val;
	 }
	 function GetSetting(){
		 $query = $this->db->prepare("select * from tbl_setting where id =1");
         $query->execute();
		 $val = $query->fetchAll();
		 return $val;
	 }
	  function isLogin()
	  {
	  	  if(isset($_SESSION['logg'])) : 
               return true;
               else : 
               	 return false;
	  	  	endif;
	  }
}

?>
