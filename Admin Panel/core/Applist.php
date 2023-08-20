<?php 

class Applist extends baseController
{
	
	
	   function add()
	  {
            error_reporting(0);
			$data = $this->getDataRequest();
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') :
			 $folderPath = "../uploads/banner/";
			 if(!empty($_FILES['cover_image']['name'])){
             $cover_image = rand(0,99999)."_".$_FILES['cover_image']['name'];
             $tpath = $folderPath . $cover_image;
             $pic = $this->compress_image($_FILES["cover_image"]["tmp_name"], $tpath,80);
             $dbfile1 = "uploads/banner/".$cover_image;
			 }else{
			   $dbfile1 = "";  
			 }
			 if(!empty($_FILES['background_image']['name'])){
             $bgimage = rand(0,99999)."_".$_FILES['background_image']['name'];
			 //$this->upload($location); 
			 $tpath1 = $folderPath . $bgimage;
			  $pic1 = $this->compress_image($_FILES["background_image"]["tmp_name"], $tpath1,80);
			 
			 $dbfile2 = "uploads/banner/".$bgimage;
			 }else{
			    $dbfile2 = ""; 
			 }
			 $query = $this->db->prepare("insert into applist (app_name,radio_stream,tv_stream,website,facebook,whatsapp,youtube,twitter,instagram,facebook_id,admob_id,admob_banner_id,admob_interstitial_id,admob_native_id,start_color,end_color,cover_image,background_image,about_us,our_service,privacy_policy) values(:app_name,:radio_stream,:tv_stream,:website,:facebook,:whatsapp,:youtube,:twitter,:instagram,:facebook_id,:admob_id,:admob_banner_id,:admob_interstitial_id,:admob_native_id,:start_color,:end_color,:cover_image,:background_image,:about_us,:our_service,:privacy_policy)");
             $query->bindParam(':app_name',$data->appname);
             $query->bindParam(':radio_stream',$data->radio_stream);
             $query->bindParam(':tv_stream',$data->tv_stream);
             $query->bindParam(':website',$data->website);
             $query->bindParam(':facebook',$data->facebook);
             $query->bindParam(':whatsapp',$data->whatsapp);
             $query->bindParam(':youtube',$data->youtube);
             $query->bindParam(':twitter',$data->twitter);
             $query->bindParam(':instagram',$data->instagram);
             $query->bindParam(':facebook_id',$data->facebook_id);
             $query->bindParam(':admob_id',$data->admob_id);
             $query->bindParam(':admob_banner_id',$data->admob_banner_id);
             $query->bindParam(':admob_interstitial_id',$data->admob_interstitial_id);
             $query->bindParam(':admob_native_id',$data->admob_native_id);
             $query->bindParam(':start_color',$data->start_color);
             $query->bindParam(':end_color',$data->end_color);
             $query->bindParam(':cover_image',$dbfile1);
             $query->bindParam(':background_image',$dbfile2);
             $query->bindParam(':about_us',$data->aboutus);
             $query->bindParam(':our_service',$data->service);
             $query->bindParam(':privacy_policy',$data->privacy_policy);
             $query->execute(); 
			echo $query ? 'success' : 'fail';
        endif;

	  }
     
        function Remove()
          {
			  
              $data = $this->getDataRequest();
              $qry = $this->db->query("delete from applist where id =".$data->id);
              echo $qry ? "success" :  "fail";
          }

          function Update()
          {
              error_reporting(0);
			   $data = $this->getDataRequest();
			    $folderPath = "../uploads/banner/";
			    if(!empty($_FILES['cover_image']['name'])){
				   $imgfile=rand(0,99999)."_".$_FILES['cover_image']['name'];
				   $get = $this->getBy("applist","id =".$data->edit_id);
				   $datas = $get[0];
				   
				   if($datas['cover_image']!="")
					{
					unlink('../'.$datas['cover_image']);
					}
				 $tpath = $folderPath . $imgfile;
				 $dbfile = 'uploads/banner/'.$imgfile;
				 $pic=$this->compress_image($_FILES["cover_image"]["tmp_name"], $tpath,80);
			   }else{
				  $dbfile = $data->old_cover;
			   } 
			   if(!empty($_FILES['background_image']['name'])){
				   $imgfile1=rand(0,99999)."_".$_FILES['background_image']['name'];
				   $get = $this->getBy("applist","id =".$data->edit_id);
				   $datas = $get[0];
				   
				   if($datas['background_image']!="")
					{
					unlink('../'.$datas['background_image']);
					}
				 $tpath1 = $folderPath . $imgfile1;
				 $dbfile1 = 'uploads/banner/'.$imgfile1;
				 $pic1=$this->compress_image($_FILES["background_image"]["tmp_name"], $tpath1,80);
			   }else{
				  $dbfile1 = $data->old_background;
			   }
               $appname = !empty($data->appname) ? $data->appname : "";
               $radio_stream = !empty($data->radio_stream) ? $data->radio_stream : "";
               $tv_stream = !empty($data->tv_stream) ? $data->tv_stream : "";
               $website = !empty($data->website) ? $data->website : "";
               $facebook = !empty($data->facebook) ? $data->facebook : "";
               $whatsapp = !empty($data->whatsapp) ? $data->whatsapp : "";
               $youtube = !empty($data->youtube) ? $data->youtube : "";
               $twitter = !empty($data->twitter) ? $data->twitter : "";
               $instagram = !empty($data->instagram) ? $data->instagram : "";
               $facebook_id = !empty($data->facebook_id) ? $data->facebook_id : "";
               $admob_id = !empty($data->admob_id) ? $data->admob_id : "";
               $admob_banner_id = !empty($data->admob_banner_id) ? $data->admob_banner_id : "";
               $admob_interstitial_id = !empty($data->admob_interstitial_id) ? $data->admob_interstitial_id : "";
               $admob_native_id = !empty($data->admob_native_id) ? $data->admob_native_id : "";
               $start_color = !empty($data->start_color) ? $data->start_color : "";
               $end_color = !empty($data->end_color) ? $data->end_color : "";
               $about = !empty($data->aboutus) ? $data->aboutus : "";
               $service = !empty($data->service) ? $data->service : "";
                $privacy_policy = !empty($data->privacy_policy) ? $data->privacy_policy : "";
               
               
                $sql = "UPDATE applist SET app_name = :app_name, radio_stream = :radio_stream, tv_stream = :tv_stream,website = :website,facebook = :facebook,whatsapp = :whatsapp,youtube = :youtube,twitter= :twitter,instagram = :instagram,facebook_id = :facebook_id,admob_id= :admob_id,admob_banner_id = :admob_banner_id,admob_interstitial_id = :admob_interstitial_id,admob_native_id = :admob_native_id,start_color = :start_color,end_color = :end_color,cover_image =:cover_image,background_image =:background_image,about_us = :about_us,our_service = :our_service,privacy_policy =:privacy_policy  WHERE id = :id";
                 $query = $this->db->prepare($sql);  
                 $query->bindParam(':app_name',$appname);
                 $query->bindParam(':radio_stream',$radio_stream);
                 $query->bindParam(':tv_stream',$tv_stream);
                 $query->bindParam(':website',$website);
                 $query->bindParam(':facebook',$facebook);
                 $query->bindParam(':whatsapp',$whatsapp);
                 $query->bindParam(':youtube',$youtube);
                 $query->bindParam(':twitter',$twitter);
                 $query->bindParam(':instagram',$instagram);
                 $query->bindParam(':facebook_id',$facebook_id);
                 $query->bindParam(':admob_id',$admob_id);
                 $query->bindParam(':admob_banner_id',$admob_banner_id);
                 $query->bindParam(':admob_interstitial_id',$admob_interstitial_id);
                 $query->bindParam(':admob_native_id',$admob_native_id);
                 $query->bindParam(':start_color',$start_color);
                 $query->bindParam(':end_color',$end_color);
                 $query->bindParam(':cover_image',$dbfile);
                 $query->bindParam(':background_image',$dbfile1);
                 $query->bindParam(':about_us',$about);
                 $query->bindParam(':our_service',$service);
                 $query->bindParam(':privacy_policy',$privacy_policy);
                 $query->bindParam(':id',$data->edit_id);
                 $query->execute();
				 
				echo $query ? "success" : "fail";
            
          }
		  function Upstatus()
          {
			 
			 $data = $this->getDataRequest();
			 
             $get = $this->getBy("applist","id =".$data->id);
			 $data = $get[0];
			 
             if($data['status'] == "0" ){
				 $val = "1";
			 }else{
				$val = "0";
			 }
			$query = $this->db->query("update applist set status = '".$val."' where id = ".$data['id']);
			echo $query ? "success" :  "fail";
			
			//print_r($query);
          }

}
?>