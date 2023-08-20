<?php 

require_once "../system/constant.php";


spl_autoload_register(function($app) {

    if(file_exists("../".SYS.DIRECTORY_SEPARATOR.$app.EXT)) : 
              
              $loadClass = "../".SYS.DIRECTORY_SEPARATOR.$app.EXT;

            elseif(file_exists("../".APP.DIRECTORY_SEPARATOR.$app.EXT)) : 
             
             $loadClass  = "../".APP.DIRECTORY_SEPARATOR.$app.EXT;
              
            elseif(file_exists("../".htmlTemplate.DIRECTORY_SEPARATOR.$app.EXT)) : 
             
                      $loadClass  = "../".htmlTemplate.DIRECTORY_SEPARATOR.$app.EXT;
					  
			elseif(file_exists("../".template.DIRECTORY_SEPARATOR.$app.EXT)) : 
             
                      $loadClass  = "../".template.DIRECTORY_SEPARATOR.$app.EXT;

            else :
             
              $loadClass = $app.EXT;

          endif;

          require_once $loadClass;

});
?>