 
<?php
		//СПИСОК ТАБЛИЦ 
   	include "BaseVar.php";
	$res = $bd->query("SHOW TABLES FROM `trate`");
	$dat = $res->fetchall(PDO::FETCH_ASSOC);
	foreach($dat as $a => $items)
	{ 
		foreach($items as $s)
		{
			if($s != 'log')
			{
				$t[$a]=$s;
				echo "<div> <center> <button type=\"button\" class=\"btn btn-link\" onclick = \"TableShow(this.name)\" name = \"$t[$a]\">$t[$a]</button></center> </div>";
			}
		}
	}	
?>



<script>
	// ВЫПАДАЮЩЕЕ МЕНЮ
	function TableShow(ogon){
		$( document ).ready(function(){
			$.ajax({
				method: "POST", // метод HTTP, используемый для запроса
				url: "buttons.php", // строка, содержащая URL адрес, на который отправляется запрос
				data:  {pic: ogon},
				success: function(msgs) { // получен ответ сервера  
					//$('#myForm').hide('slow');
					$('#vol').html(msgs);
				}
			});
		});
	}
</script>


