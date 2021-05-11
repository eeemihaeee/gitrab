<?php
	$fh = fopen('..\..\testo.txt', "r");
    list($f1,$f2,$f3)= fscanf($fh, "%s %s %s");
	$h_xleb = "$f1";
    $db_name_xleb = "$f2";
	$u_xleb = "$f3";
	$p_xleb = "";
	// Подключение к базе  данных
	try {
		$bd_xleb = new PDO("mysql:host={$h_xleb};dbname={$db_name_xleb};", $u_xleb, $p_xleb);
		$bd_xleb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}  
	// Ошибка 
	catch(PDOException $exception){
		header("HTTP/1.0 501");
		include "Errors_prog/501.php";
		exit;
		//echo "Проблема с подключением: " . $exception->getMessage();
	}
?>