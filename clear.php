<?php 
    include "BaseVar.php";
	//ОЧИСТКА ТАБЛИЦЫ 	
	$tabler = htmlentities(file_get_contents("eeemihaeee.txt"));
	$zap = "truncate table $tabler";
	$bd->query($zap);
	$zapros = "SELECT * from $tabler";
	vivod($bd, $zapros, $tabler); 	// Функция библиотеки TableT
?>