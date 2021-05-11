<script src ="spisok.js"></script> 


<?php
	$host = "localhost";
	$db_name = "trate";
	$username = "root";
	$password = "";
	// Подключение к базе данных
	try {
		$bd = new PDO("mysql:host={$host};dbname={$db_name};", $username, $password);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}  
	// Ошибка 
	catch(PDOException $exception){
		echo "Проблема с подключением: " . $exception->getMessage();
	}
	
	
	// вывод таблицы
	function vivod($bd, $zapros, $nametable) 
	{ 
		echo "<center>$nametable</center>";
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
		echo "<th>Операции</th>";
		foreach($date as $a => $items)
		{
			echo "<tr>";
			foreach($items as $s)
			{
				echo "<td>"."$s"." ";
				$valuess[$a]=$s;
				//print_r($valuess);
			}
			$id[] = $items['id'];
			$Ntabl = $nametable;
			echo "<td>"."<button type = \"button\" class=\"btn btn-danger\" onclick = \"DeletS($id[$a])\" >Удалить</button><button type = \"button\" style=\"margin-left:10px;\" onclick = \"updateS($id[$a])\"  class=\"btn btn-warning\">Изменить</button>";
		} 
		echo "</table>";
		
		// ЗАПИСЬ В ФАЙЛ
		$fd = fopen("tanos.txt", 'w');  	
		fwrite($fd, $nametable);
		fclose($fd);
		
		
		
		// ДОБАЛЕНИЕ СТРОКИ
		echo "<button type = \"button\" id = \"batpole\" style=\"margin-left:30px; \" class=\"btn btn-primary\" >Добавить запись</button>";
		
		
		// ОПЕРАЦИИ СО СТОЛБЦАМИ
		echo "	<div class=\"btn-group\" >
			  	<button type=\"button\" id = \"btn\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" name =\"dar\" style=\"margin-left:10px; \">
			    Операции с атрибут <span class=\"caret\"></span>
			  	</button>
			  	<ul class=\"dropdown-menu\" style=\"margin-left:30px; \">
			  	<li class=\"dropdown-item\"><a href=\"#myModalBoxADD\" class=\"btn btn-link\" data-toggle=\"modal\">Добавить столбец</a></li>
				<li class=\"dropdown-item\"><button type = \"button\" id =\"$nametable\" class=\"btn btn-link\" onclick = \"modulx(this.id)\">Удалить столбец</button></li>
				<li class=\"dropdown-item\"><button type = \"button\" id =\"$nametable\" class=\"btn btn-link\" onclick = \"rename(this.id)\">Переименовать столбец</button></li>
				</ul>
				</div>";
				
		//Очистка таблицы 
		echo "<button type = \"button\" style=\"margin-left:1160px;\" id = \"cleara\" class=\"btn btn-danger\">Очистить таблицу</button>";
		//Кнопка удаления таблицы
		echo "<button type = \"button\" style=\"margin-left:15px;\"  class=\"btn btn-danger\" name = '$nametable' onclick = \"DeletTable(this.name)\" >Удалить таблицу</button>";
		
		
		echo "<p><form id = \"peredah\"><div id = \"zapolner\"></div></form>";
		echo "<p><form id = \"newupdar\"><div id = \"newup\"></div></form>";
	}
	
	

?>
<script>
	function modulx(ogorod){
		
		$( document ).ready(function(){
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "listtable.php", // строка, содержащая URL адрес, на который отправляется запрос
				data:  {picd: ogorod},
				success: function(msge) { // получен ответ сервера  
					var st = msge;
					document.getElementById('dory').innerHTML = st;
					$('#myModalBoxDEL').modal('show');
				}
			});
		});
	}
</script>

<script>
	function rename(ogorod){
		
		$( document ).ready(function(){
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "listtable.php", // строка, содержащая URL адрес, на который отправляется запрос
				data:  {picd: ogorod},
				success: function(msge) { // получен ответ сервера  
					var st = msge;
					document.getElementById('dron').innerHTML = st;
					$('#myModalBoxRE').modal('show');
				}
			});
		});
	}
</script>

<script>
	function updateS( ogog){
		$( document ).ready(function(){
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "updatepole.php", // строка, содержащая URL адрес, на который отправляется запрос
				data:  {picd: ogog},
				success: function(msge) { // получен ответ сервера  
					//$('#myForm').hide('slow');
					$('#newup').html(msge);
				}
			});
		});
	}
</script>

<script>
 //ОЧИСТКА ТАБЛИЦЫ
$( document ).ready(function(){
	$( "#cleara" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "clear.php", // строка, содержащая URL адрес, на который отправляется запрос
			success: function(msg) { // получен ответ сервера  
				$('#vol').html(msg);
			}
		});
	});
});	
</script>



