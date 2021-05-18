//Выход
<?php 
	$agent=$_SERVER['HTTP_USER_AGENT'];
	setcookie("user", $agent, time()-3600, "/");
	include "stat.php";
	header('Location: /');
?>
