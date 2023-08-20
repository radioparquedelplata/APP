<?php 

function Route($slug)
{
   switch ($slug) {  
	case 'applist':
		 return 'applist';
	break; 
	case 'account':
		 return 'account';
	break; 
	case 'setting':
		 return 'setting';
	break;  
	case 'push_notification':
		 return 'push_notification';
	break; 
    default:
		return "main";
		break;
   }
}


?>