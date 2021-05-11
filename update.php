<?php 
	include "BaseVar.php";
	$tab = htmlentities(file_get_contents("eeemihaeee.txt"));
	
	
	//UPDATE table_name SET column1=new_value, column2=new_value WHERE condition;
    $id = $_POST['hid'];
	
	//ХРЕНЬ ДЛЯ ПОЛУЧЕНИЯ НАЗВАНИЯ АТРИБУТА
	$res = $bd->query("select * from $tab");
	for ($i = 0; $i< $res->columnCount(); $i++)
	{
		$col = $res->getColumnMeta($i);
	    $colums[]=$col['name'];
	}
	//ХРЕНЬ ДЛЯ ПОЛУЧЕИЯ СТРОКИ С ID
	$we = "SELECT * FROM $tab where id = $id";	
	$res = $bd->query($we);
	$date = $res->fetchall(PDO::FETCH_ASSOC);
	$qer = "";
	foreach($date as $a => $items)
	{
		$i=0;
		foreach($items as $s)
		{
			$qer=$qer.$colums[$i].": ".$s.", ";
			$i++;
		}
	} 
	
	$new =$new."id: $id, ";
	//ОБНОВЛЕНИЕ
	$sql="UPDATE `$tab` SET";
	$res = $bd->query("select * from $tab");
	$date = $res->fetchall(PDO::FETCH_ASSOC);
	for ($i = 0; $i< $res->columnCount(); $i++)
	{
		$col = $res->getColumnMeta($i);
		$colums[]=$col['name'];
	}

    for($i=1;$i<$res->columnCount();$i++)
    {
		$column_title=$_POST["$colums[$i]"];	
		
		if(isset($column_title))
		{
			$sql=$sql." `$colums[$i]`='$column_title' ";
			$new=$new." $colums[$i]: $column_title, ";
			if($i+1<$res->columnCount())
			{
				$sql=$sql.",";
			}
		}

	}
	// тригер 
	$droptr = "DROP TRIGGER IF EXISTS `1$tab`;";
	$bd->query($droptr);
	$trigD = "CREATE TRIGGER `1$tab` AFTER UPDATE ON `$tab` FOR EACH ROW 
				BEGIN
					INSERT INTO log (Информация) values ('UPDATE: OLD ($qer) -- NEW ($new) таблица $tab ');
				END";
	$bd->query($trigD);
	
	
	$sql=$sql."where id = $id";
	$bd->query($sql);
	$zapros = "SELECT * from $tab";
	vivod($bd, $zapros, $tab); 	// Функциzя библиотеки TableT

?>