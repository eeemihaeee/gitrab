<?php  
include "Table_maslo.php"; 
include "dictionary.php";
	
	if(isset($_POST['go']))
	{
		$sug = $_POST['sugar'];
		$res = $bd_xleb->query("SELECT login FROM maslo WHERE login ='$sug'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		$ches = $bd_xleb->query(" SELECT password FROM maslo WHERE login ='$sug'");
		$pass = $ches->fetchall(PDO::FETCH_ASSOC);
		
		try{
			avtoris($pass);
			$agent=$_SERVER['HTTP_USER_AGENT'];
			setcookie("user", $agent, time()+3600, "/");
			include "stat.php";
			header('Location: /');
		}catch(Exception $e){
			header("HTTP/1.0 401");			
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
			include "index.php";
			exit;
		}
		
	}
?>