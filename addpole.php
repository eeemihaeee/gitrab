 
<?php
include "BaseVar.php";
		
	$tab = htmlentities(file_get_contents("tanos.txt"));
	$res = $bd->query("select * from $tab");
	$date = $res->fetchall(PDO::FETCH_ASSOC);
	echo "<table style = \"border: 1px solid grey\" class = \"table table-bordered table-condensed table-striped table-hover  \">";
	echo "<tr class=\"bg-info\">";
	for ($i = 0; $i< $res->columnCount(); $i++)
	{
		$col = $res->getColumnMeta($i);
		$colums[]=$col['name'];
		echo "<th>".$colums[$i]."</th>";
	}
	echo "<tr>";
	for ($i = 0; $i< $res->columnCount(); $i++)
	{
		if($colums[$i]!="id") # столбец id не заполняем
		{			
			echo"<td><input type=\"text\" autofocus name=\"$colums[$i]\" placeholder=\"$colums[$i]\" class=\"form-control\" size=\"1\"style=\"margin-right:10px;\"></td>";
		}
		else echo "<td><label>id</label>"; 
	}
	echo "</tr>";
	echo "</table>";
	echo "<center><button type=\"button\" id = \"dd\"  class=\"btn btn-primary\">Добавить</button></center>";

?>
<script>
	$( document ).ready(function(){
		$( "#dd" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "dobavstr.php", // строка, содержащая URL адрес, на который отправляется запрос
				data:  $('#peredah').serialize(),
				success: function(msgq) { // получен ответ сервера  
				$('#vol').html(msgq);
				}
			});
		});
	});	
</script>