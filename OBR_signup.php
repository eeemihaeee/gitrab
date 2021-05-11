<?php
	include "Table_maslo.php";
	include "dictionary.php";
	
	if(isset($_POST['go']))
	{
		$sug = filter_var($_POST['sugar'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$res = $bd_xleb->query(" SELECT login FROM maslo WHERE login ='$sug'");
		$records = $res->fetchall(PDO::FETCH_ASSOC);
		
		try{
			registr($records);
			$ches = password_hash(htmlspecialchars(filter_var($_POST['cheese'],FILTER_SANITIZE_URL,FILTER_SANITIZE_FULL_SPECIAL_CHARS)),PASSWORD_DEFAULT);
			$res = $bd_xleb->query("insert into maslo (login, password) values ('$sug ', '$ches')");
			include "index.php";
			exit;	
		}catch(Exception $e){	
			header("HTTP/1.0 401");		
			echo '<center><div style = "color: red;">'.$e->getMessage().'</div></center><hr>';
			include "signup.php";
			exit;
			
		}
	}
	
?>