 <?php 
	include "BaseVar.php";
	$tab = htmlentities(file_get_contents("eeemihaeee.txt"));
	$var = "";
	
	// ДОБАВЛЕНИЕ СТРОКИ
	$sql="insert into $tab ( id";
	
	$res = $bd->query("select * from $tab");
	$date = $res->fetchall(PDO::FETCH_ASSOC);
	for ($i = 0; $i< $res->columnCount(); $i++)
	{
		$col = $res->getColumnMeta($i);
		$colums[]=$col['name'];
		if($colums[$i]!="id") # столбец id не заполняем
		{
			$sql = $sql.",`$colums[$i]`";
		}
	}
	$sql = $sql.") values (null";
	
	//ХРЕНЬ ДЛЯ ПОЛУЧЕИЯ СТРОКИ С ID
	$gold = "$colums[0]: 1, ";
	$we = "SELECT * FROM $tab ORDER BY id DESC LIMIT 1";	
	$res = $bd->query($we);
	$date = $res->fetchall(PDO::FETCH_ASSOC);
	foreach($date as $a => $items)
	{
		$i=0;
		foreach($items as $s)
		{
			if($i == 0)
			{
				$a = $s+1;
				$gold = "$colums[0]: $a, ";
				$i++;
			}
		}
	} 
	$var = $var."$gold";

    for($i=1;$i<$res->columnCount();$i++)
    {
		
		$column_title=$_POST["$colums[$i]"];	
		
		if(isset($column_title))
		{
			$var = $var."$colums[$i]: $column_title,";
			$sql=$sql.",\"$column_title\" ";
		}

	}
	
	
	// тригер 
	$droptr = "DROP TRIGGER IF EXISTS `1$tab`;";
	$bd->query($droptr);
	$trigD = "CREATE TRIGGER `1$tab` AFTER INSERT ON `$tab` FOR EACH ROW 
				BEGIN
					INSERT INTO log (Информация) values ('INSERT: ($var) в таблицу $tab ');
				END";
	$bd->query($trigD);
	
	
	// ДОБАВЛЕНИЕ СТРОКИ
	$sql=$sql.")";
	$bd->query($sql);
	$zapros = "SELECT * from $tab";
	vivod($bd, $zapros, $tab); 	// Функция библиотеки TableT
	
?>