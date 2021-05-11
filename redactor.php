<html> 
    <head>
        <meta charset="utf-8">
        <title>База данных</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" >			
    </head>
	<body>

		<?php 
			include "BaseVar.php";
			$res = $bd->query("SHOW TABLES FROM `trate`");
			$dat = $res->fetchall(PDO::FETCH_ASSOC);
			foreach($dat as $a => $items)
			{ 
				foreach($items as $s)
				{
					$t[$a]=$s;
				}
			}
			foreach ($t as $key => $val) {
				if(isset($_POST['table']) && $val==$_POST['table'])
				{	
					if(isset($_POST['table']))
					{
						$ap = $_POST['table'];
					}
					else $ap = htmlentities(file_get_contents("tanos.txt"));
					$zapros = "SELECT * from $ap";
					$res = $bd->query($zapros);
					$data = $res->fetchall(PDO::FETCH_ASSOC);												
					echo "<table style = \"border: 1px solid grey\" class = \"table table-bordered table-condensed table-striped table-hover  \">";
					vivod($data, $bd, $zapros, $ap); 	// Функция библиотеки TableT
					echo "</table>";
				}  
			} 
			$fd = fopen("tanos.txt", 'w');
			$peredac = $_POST['table'];  	
			fwrite($fd, $peredac);
			fclose($fd);
		?>	
		
		
		<div id ="Deleter"> 
			<input type="number"  autofocus name="num" size="30" style="margin-left:30px;margin-top:30px;margin-bottom:10px; ">
			<button type="button" id ="de" class="btn btn-primary ">Выполнить</button>
		</div>
		
		<script src = "ajax_user.js"></script>
	</body>
</html>