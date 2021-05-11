<?php 
    include "BaseVar.php";
	//ОЧИСТКА ТАБЛИЦЫ 	
	$zap = "truncate table log";
	$bd->query($zap);	
?>