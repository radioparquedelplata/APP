<?php 
require_once "App.php";
$base  = new getResponse;
$session = $base->sessionTokens();
//print_r($session->islogin);
$uri = $base->setRequest();
$session->isLogin = true;
switch ($uri[2]) {
        case 'log' :
        if($uri[3]=='login') :
          $base->Auth();
      elseif($uri[3] =='signout') :
          $base->logout();
        endif;
        break;
		case 'applist' :
		$Applist  = new Applist;
		if($uri[3] =='add') :
			$Applist->add();
			elseif($uri[3]=='delete') : 
			$Applist->Remove();
			elseif($uri[3] == 'update') :
			$Applist->Update();
			elseif($uri[3] == 'active') :
			$Applist->Upstatus();
		endif;
		break;
		case 'account' :
		$Account  = new Account;
		if($uri[3] =='update'):
			$Account->Update();
		elseif($uri[3] == 'updateserver') :
			$Account->UpdateKey();
		endif;
		break;
		case 'setting' :
		$Setting  = new Setting;
		if($uri[3] =='update') :
			$Setting->Update();
		endif;
		break;
		case 'notification' :
		$Notification  = new Notification;
		if($uri[3] =='add') :
			$Notification->add();
		endif;
		break;
	default:
	 echo json_encode(["error"=>"response not found"]);
		break;
}

?>
