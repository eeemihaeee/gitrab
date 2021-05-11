<?php
	include "BaseVar.php";  
	$dw = $_POST['picd'];
	$reg = $bd->query("select * from $dw");
	$date = $reg->fetchall(PDO::FETCH_ASSOC);
	echo "<select type = \"text\" name=\"spisok\">";
	for ($i = 0; $i< $reg->columnCount(); $i++)
	{
		$col = $reg->getColumnMeta($i);
		$colums[]=$col['name'];
		if($colums[$i]!="id" && $colums[$i]!="ID") # столбец id не заполняем
		{
			echo "<option value = \"$colums[$i]\">$colums[$i]&emsp;</option>";
		}
	}
	echo "</select>";
?>
