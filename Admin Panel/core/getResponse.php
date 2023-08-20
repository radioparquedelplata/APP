<?php 

class getResponse extends baseController 
{
     
     function load($request)
      {
      	 $this->loadView($request);
      }

      function Auth()
      {
      	 $data = $this->getDataRequest();
      	 if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') : 
				$name = $data->username;
				$pass = $data->password;
				$qry = $this->db->query("select * from admin where username ='$name'");
				$qry->execute();
				if($qry->rowCount() > 0){
				$val = $qry->fetch(PDO::FETCH_ASSOC);
				//$val = $value[0];	
				$hash = $val['password'];
				$auth = password_verify($pass, $hash);
				
				if($name == $val["username"] && $pass == $auth && $auth !=''):
                     $_SESSION['logg']  = true;
                     $_SESSION['uname']  = $val['name'];
                     $_SESSION['id']  = $val['id'];
					 echo json_encode(["message"=>"Logged In....","status"=>"success"]);
                 else : 
                 	 echo json_encode(["message"=>"Email or Password does not match","status"=>"fail"]);
               endif;
			   }else{
					echo json_encode(["message"=>"Email does not match","status"=>"fail"]);
				}
   
         else :

      	 endif;
      }
      function logout()
      {
      	   session_destroy();
      }


}
?>