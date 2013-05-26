<?php 

define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');
define('DB_NAME','stars');
define('TABLE','stars');

 foreach ($_POST as $key=>$value) {
   echo("$key: $value<br />\n");
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

switch ($_POST["action"])
{
	case 'add':
		$query = 'INSERT INTO '.TABLE.' (id,x_pos,y_pos,size) VALUES (\''.$_POST["id"].'\',\''.$_POST["x"].'\',\''.$_POST["y"].'\',\''.$_POST["s"].'\')';
		echo $query;
		if (!$mysqli->query($query)) {
			printf("Error: %s\n", mysqli_error($mysqli));
		}
		break;
	case 'update':
		$query = "UPDATE ".TABLE." SET `x_pos`='".$_POST["x"]."',`y_pos`='".$_POST["y"]."' WHERE `id`='".$_POST["id"]."';";
		echo $query;
		if (!$mysqli->query($query)) {
			printf("Error: %s\n", mysqli_error($mysqli));
		}
		break;
	default:
	
}
	
?>
