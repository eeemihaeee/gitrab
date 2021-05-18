<?php 
    include "BaseVar.php";
	//УДАЛЕНИЕ  ТАБЛИЦЫ	
	$ter = $_POST['pica'];
	$zap = "drop table $ter"; // drop
	$bd->query($zap);
	
?>
 