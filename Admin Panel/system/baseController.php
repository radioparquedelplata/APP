<?php 

class baseController extends System
{


         
       function loadView($page)
       {
         
         if(file_exists(view.DIRECTORY_SEPARATOR.$page.EXT)) :
          if(isset($_SESSION['logg'])) :
          require_once  template.DIRECTORY_SEPARATOR.'head'.EXT;
          require_once  template.DIRECTORY_SEPARATOR.'header'.EXT;
          require_once  view.DIRECTORY_SEPARATOR.$page.EXT;
          require_once  template.DIRECTORY_SEPARATOR."footer".EXT;

          else : 
                
          require_once  template.DIRECTORY_SEPARATOR.'head'.EXT;
          require_once  view.DIRECTORY_SEPARATOR."login".EXT;
          require_once  template.DIRECTORY_SEPARATOR."footer".EXT;

          endif;
         else : 
		 
        endif;
       }



       function SetRequest()
       { 
            $r    = isset($_REQUEST['q']) ?  $_REQUEST['q'] : '';
            $data = explode('/',$r);

            return $data;

       }

       function getDataRequest()
       {
            
            return (object) $_REQUEST;

       }


       function FilterData($array)
       {
            return array_filter($array,function($data){
                     return htmlspecialchars(strip_tags($data));
              });
       }
			//Create compress Image
			 function compress_image($source_url, $destination_url, $quality) {

				   $info = getimagesize($source_url);

					if ($info['mime'] == 'image/jpeg')
						  $image = imagecreatefromjpeg($source_url);

					elseif ($info['mime'] == 'image/gif')
						  $image = imagecreatefromgif($source_url);

				  elseif ($info['mime'] == 'image/png')
						  $image = imagecreatefrompng($source_url);

					imagejpeg($image, $destination_url, $quality);
				return $destination_url;
			}
		
       function is_null($arr)
       {    
           $arr   = (array) $arr;
           echo $count = count($arr);
          
           $last = 0; 
             for($i = 0; $i < $count; $i++){
              if($arr[$i] == false){
                $data[] =  $arr[$i] = $arr;
              } else {
                 $data[] = $last = $arr[$i];
              }
          }

          return $data;
       }
}
?>