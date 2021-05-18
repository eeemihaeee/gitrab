<?php
	//Удаление column
	include "BaseVar.php" ;
	
	$tab = htmlentities(file_get_contents("tanos.txt"));
	
	$column_title=$_POST["spisok"];	
	$sql="alter table $tab drop $column_title ";
	$bd->query($sql);
	$zapros = "SELECT * from $tab";
	vivod($bd, $zapros, $tab);
	
        if($column_value=="tex")
       {
            $sql=$sql." VARCHAR(250) ";
       }
       if($column_value=="int")
       {
            $sql=$sql."INT ";
       }
	}
	$sql=$sql.")";
	$bd->query($sql);
	$zapros = "SELECT * from `$table_title`";
?>