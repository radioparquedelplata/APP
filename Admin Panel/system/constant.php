<?php 
 session_start();
// database connection
if($_SERVER['HTTP_HOST']=="localhost"){
			//local
      DEFINE ('DB_USER', 'root'); //your local host db user
      DEFINE ('DB_PASSWORD', '');//your local host db password
      DEFINE ('DB_HOST', 'localhost');//your local host db host
      DEFINE ('DB_NAME', 'singleapp');//your local host db name
	}
	else{
		//live
		DEFINE ('DB_USER', 'root'); //your live db user
		DEFINE ('DB_PASSWORD', '');//your live db password
		DEFINE ('DB_HOST', 'localhost');//your live db host
		DEFINE ('DB_NAME', 'singleapp');//your live db name
	}

/***********************************************************************************/
// global variable
define("SYS","system");
define("APP","core");

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $http = "https://";
else
    $http = "http://";
$host  = $http.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER["SCRIPT_NAME"]);

define("siteUrl",$host);

define("loadAPP","bootstrap");

define("EXT",".php");

define("view","src");

define('template',"layout");

define("htmlTemplate",'system/lib');


$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $data = $mysqli->query("select * from tbl_setting");
    $num = $data->num_rows;
    if($num > 0){
    $row = $data->fetch_assoc();
    define('TITLE',$row['title']);
    define('DESC',$row['description']);
    define('LOGO',$row['logo']);
    define('TRACKING_ID',$row['tracking_id']);
    define('EMAIL',$row['email']);
    define('HOST',$row['host']);
    define('UNAME',$row['username']);
    define('PASS',$row['password']);
    define('ENCRYPTION',$row['encryption']);
    define('PORT',$row['port']);
    define('REPLYEMAIL',$row['reply_to']);
    }
	if($_SESSION){
	$data1 = $mysqli->query("select * from admin");
    $num1 = $data1->num_rows;
    if($num1 > 0){
    $row1 = $data1->fetch_assoc();
    define('SERVER_KEY',$row1['server_key']);
    }
	}

?>