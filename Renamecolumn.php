<?php
	include "BaseVar.php"; 
	
	$tab = htmlentities(file_get_contents("tanos.txt"));
	//ALTER TABLE table_name CHANGE COLUMN old_column_name new_column_name new_data_type;
	$column_title=$_POST["spisok"];	
	$newname=$_POST["newcolumn"];	
	$type=$_POST["spis"];
	$sql="alter table `$tab` CHANGE COLUMN `$column_title` `$newname` $type";
	$bd->query($sql);
	$zapros = "SELECT * from $tab";
	vivod($bd, $zapros, $tab);
?>