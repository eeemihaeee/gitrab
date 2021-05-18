<?php 
    include "BaseVar.php";
	//ОЧИСТКА ТАБЛИЦЫ 	
	$zap = "truncate table log"; //CLEAR
	$bd->query($zap);	
?>