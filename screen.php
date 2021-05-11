<?php 
	include "BaseVar.php";
// ЗАПРОСЫ НА ПЕРВОЙ СТРАНИЦЕ  
	if(isset($_POST['user']))
	{
		global $data;
		$zapros = $_POST['user'];
		$res = $bd->query($zapros);	
		//$first = explode(" ", $zapros);
		//if($first[0] =="select" ||$first[0] =="Select" ||$first[0] =="SELECT")
		//{
			//vivod($bd, $zapros, ""); 	// Функция библиотеки TableT
			$date = $res->fetchall(PDO::FETCH_ASSOC);
			echo "<table style = \"border: 1px solid grey\"  class = \"table table-bordered table-condensed table-striped table-hover  \">";
			echo "<tr class=\"bg-info\">";
			for ($i = 0; $i< $res->columnCount(); $i++)
			{
				$col = $res->getColumnMeta($i);
				$colums[]=$col['name'];
				echo "<th>".$colums[$i]."</th>";
			}
			foreach($date as $a => $items)
			{
				echo "<tr>";
				foreach($items as $s)
				{
					echo "<td>"."$s"." ";
				}
			} 
			echo "</table>";
		//}
	} 
?>