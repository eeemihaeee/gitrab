 <?php 
	include "BaseVar.php";
	$name_table = $_POST['pic'];
	$zapros = "SELECT * from `$name_table`";
	vivod($bd, $zapros, $name_table); 	// Функция библиотеки TableT
	
?>