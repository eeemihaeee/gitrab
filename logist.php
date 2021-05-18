<?php
	include "BaseVar.php";
	echo "<center>log</center>";
	$zapros = "SELECT * from log";
	$res = $bd->query($zapros);
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
	echo "<center><button type = \"button\" id = \"clearlog\" class=\"btn btn-danger\">Очистить таблицу</button></center>";
	
	
	//ПОДСКАЗКА (ЧТОБЫ НЕ ИСКАТЬ)
	//CREATE TRIGGER trigger_name trigger_time trigger_event ON tbl_name FOR EACH ROW trigger_stmt
	///trigger_name — название триггера
	//trigger_time — Время срабатывания триггера. BEFORE — перед событием. AFTER —
	//после события.
	//trigger_event — Событие:
	//insert — событие возбуждается операторами insert, data load, replace
	//update — событие возбуждается оператором update
	//delete — событие возбуждается операторами delete, replace. Операторы DROP TABLE и
	//TRUNCATE не активируют выполнение триггера
	//tbl_name — название таблицы
	//trigger_stmt выражение, которое выполняется при активации триггера 
?>

<script>
	 //ОЧИСТКА ТАБЛИЦЫ
	$( document ).ready(function(){
		$( "#clearlog" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "clearlog.php", // строка, содержащая URL адрес, на который отправляется запрос
				success: function(msg) { // получен ответ сервера  
					$('#vol').html(msg);
				}
			});
		});
	});	
</script>