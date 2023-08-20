<?php 
class Setting extends baseController
{
         function Update()
          {
			  $data = $this->getDataRequest();
			  //print_r($data);
              $folderPath = "../uploads/logo/";
               $title = !empty($data->title) ? $data->title : "";
               $description = !empty($data->description) ? $data->description : "";
               $email = !empty($data->email) ? $data->email : "";
               $contact = !empty($data->contact) ? $data->contact : "";
               $address = !empty($data->address) ? $data->address : "";
               if(!empty($_FILES['uploadfile']['name'])){
				   $imgfile=rand(0,99999)."_".$_FILES['uploadfile']['name'];
				   $get = $this->getBy("tbl_setting","id =".$data->id);
				   $datas = $get[0];
				   
				   if($datas['logo']!="")
					{
					unlink('../'.$datas['logo']);
					}
				   //$location = $folderPath . $imgfile; 
                   //$this->upload($location);
				 $tpath1 = $folderPath . $imgfile;
				 $dbfile = "uploads/logo/".$imgfile;
				 $pic1=$this->compress_image($_FILES["uploadfile"]["tmp_name"], $tpath1,80);
			   }else{
				  $dbfile = $data->upfile;
			   } 
              $update = $this->db->query("update tbl_setting set title = '".$title."',description='".$description."' ,logo='".$dbfile."' ,contact='".$contact."',email='".$email."'
			  ,address='".$address."' where id =".$data->id);
			  echo $update ? "success" :  "fail";
          }
}
?>