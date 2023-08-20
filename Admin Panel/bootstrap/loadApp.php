<?php 

spl_autoload_register(function($load) {
         
         if(file_exists(SYS.DIRECTORY_SEPARATOR.$load.EXT)) : 
              
              $loadClass = SYS.DIRECTORY_SEPARATOR.$load.EXT;

            elseif(file_exists(APP.DIRECTORY_SEPARATOR.$load.EXT)) : 
             
             $loadClass  = APP.DIRECTORY_SEPARATOR.$load.EXT;
              
            elseif(file_exists(htmlTemplate.DIRECTORY_SEPARATOR.$load.EXT)) : 
             
                      $loadClass  = htmlTemplate.DIRECTORY_SEPARATOR.$load.EXT;
 
            elseif(file_exists(template.DIRECTORY_SEPARATOR.$load.EXT)) : 
             
                      $loadClass  = template.DIRECTORY_SEPARATOR.$load.EXT;

            else :
             
              $loadClass = $load.EXT;

          endif;

          require_once $loadClass;
});

$Boot = new bootApp;

?>