<?php 
require "db.php";
class Apps extends db
{
   
	function __construct()
	{
		parent::__construct();
		
	}
	function Appdetail(){
	    $id = $_REQUEST['id'];
	    $query = $this->db->query("select * from applist where id = '$id' and status=1");
	    if($query->num_rows>0) :
		  while($row = $query->fetch_assoc()) :
		     $url =  dirname(siteUrl) ;
		    $coverimg = $url.'/'.$row['cover_image'];
		    $backgroundimg = $url.'/'.$row['background_image'];
		    $set['app'][] = array_merge($row,array('cover_image'=>$coverimg,'background_image'=>$backgroundimg));
		    $set['success']        =  1;
		    $set['status']         = 'success';
		  endwhile;
		 else : 
		    $set['app'][] = array("Message"=>"No app Found");
		    $set['success']        =  0;
		    $set['status']         = 'fail';
 		  endif;
		 
		 echo json_encode($set);
	}
	/******device token***********/
		function AddTokendetail(){
		if(isset($_REQUEST['device_id']) && isset($_REQUEST['device_token'])){    
	    $device_id = $_REQUEST['device_id'];
	    $device_token = $_REQUEST['device_token'];
		$query = $this->db->query("select * from device_token where device_id = '$device_id'");
		if($query->num_rows > 0) :
		    $update = $this->db->query("update device_token set device_token = '$device_token' where device_id ='$device_id'");
		  $row = $query->fetch_assoc(); 
		    if($update){
    		    $set['message']  =  "success";
    		    $set['status']  = 1;
		    }else{
		        $set['message']  =  "fail";
    		    $set['status']  = 0;
		    }
		 else : 
		     $insert = $this->db->query("insert into device_token (device_id,device_token)values('$device_id','$device_token')");
		    if($insert){
    		    $set['message']  =  "success";
    		    $set['status']  = 1;
		    }else{
		        $set['message']  =  "fail";
    		    $set['status']  = 0;
		    }
 		    endif;
		    }
    		else{
    			 $set['message']  =  "Invalid parameter or empty";
    		     $set['status']  = 0;
    		 }
			echo json_encode($set,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
		}   
    
	
}

?>