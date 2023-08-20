<?php 

class System extends dataBase
{
    protected $tableKEY;
     function test() 
     {
     	 print_r($this->db);
     }
        
       function upload($path) 
       {  
            return move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path);     
       }   
       function uploads($path) 
       {  
            return move_uploaded_file($_FILES['bannerimage']['tmp_name'], $path);     
       } 

     function DBAll()
     {
		
         $query = $this->db->prepare("show tables");
         
         $query->execute();

         $table = $query->fetchAll(); 
         for($x=0;$x<count($table);$x++)
         {
              $key  = implode('',array_keys($table[$x]));
              $key  = str_replace(0,"",$key);
              
              $tables[] = $table[$x][$key];
         }

         return $tables;
     }


      function  sessionTokens()
     {
       
       return (object) $_SESSION;
     }




     function getBy($get,$params =null)
     {
         $table = $get;
          $cond = !empty($params) ? "where ".$params : "";
         $query = $this->db->query("select * from $table $cond");

         $query->execute();

         return $query->fetchAll();
     }


    function getID()
     {
             $get  = $this->getDataRequest();
             $id   = explode("/",$get->q);
             return end($id);
     }
	 
}
?>