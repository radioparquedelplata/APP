<?php 

class Notification extends baseController
{
	
	
	  function fcm($registrationIds,$msg,$serverKey)
                        		{		
		$fields = array(
				'registration_ids' 	=> $registrationIds,
				'notification'=> $msg
			);
			 
			$headers = array(
				'Authorization: key=' . $serverKey,
				'Content-Type: application/json'
			);
			 
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			if($result){
				return true;
			}else{
				return false;
			}
		}	
	
	  function add()
	  {
			$data = $this->getDataRequest();
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') : 
			$serverKey = SERVER_KEY;
			$title = $data->title;
			$message = $data->message;
			$registrationIds = array();
			$msg = array(
				'title' =>$title,
				'body' => $message,
				'icon' =>'myIcon', 
				'sound' => 'default'
				);
			 $qry = $query = $this->db->prepare("SELECT * FROM device_token");
			 $qry->execute();
		 	if($qry->rowCount() > 0){
		 	    $val = $qry->fetchAll();
				foreach($val as $row){
				 array_push($registrationIds,$row['device_token']);
			    }
			    $push = $this->fcm($registrationIds,$msg,$serverKey);
			echo $push ? 'success' : 'fail';
		 	}else{
		 	   echo 'fail';
		 	}

        endif;

	  }
     

}
?>