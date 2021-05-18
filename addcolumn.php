<?php 
include "BaseVar.php";

	if(isset($_POST['column']))
	{
		$tabler = htmlentities(file_get_contents("eeemihaee.txt"));

		$column_title=$_POST["column"];	
		$column_value=$_POST["listok"];
		$type = "";
			
		if($column_value=="char")
		{
			$type = " VARCHAR(50) ";
		}
		if($column_value=="int")
		{
			$type = " INT ";
		}
		
		
		$sql="alter table `$tabler` add `$column_title` $type ";
		$bd->query($sql);
		$zapros = "SELECT * from $tabler";
		vivod($bd, $zapros, $tabler); 	// Функция библиотеки TableT Tablet User Interface
	}
    
 

?>