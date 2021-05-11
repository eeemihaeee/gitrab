<?php
include "BaseVar.php" ;
	$table_title=$_POST["nametable"];
	
	$sql="CREATE TABLE `$table_title`(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY";
    for($i=0;$i<20;$i++)
    {
		$column_title=$_POST["mod".($i)];	
		$column_value=$_POST["list".($i)];
		
		if(isset($column_title))
        {
        	$sql=$sql.",`$column_title` ";
        }

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
	vivod($bd, $zapros, $table_title); 	// Функция библиотеки TableT

?>