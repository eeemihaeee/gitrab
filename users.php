<?php include "Table_maslo.php"; ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>База данных</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" >			
    </head>
	<body>
		<?php if(isset($_COOKIE["user"])):?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<!--<script src ="prob.js"></script>-->
			<script src ="spisok.js"></script>
			<script src ="new2.js"></script>
		
			<!-- Навбар-->
			<ul class="nav nav-tabs">
				<li role="navigation" ><a href="/index.php">Запросы MySQL</a></li>
				<li role="navigation" class="active"><a href="#">Базы данных</a></li>
			</ul>
			<br>
			
			<center>
				
				<!-- СОЗДАНИЕ ТАБЛИЦЫ МОДАЛЬНОЕ ОКНО-->
				
					<div id="myModalBox" class="modal fade">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Заголовок модального окна -->
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Создание таблицы</h4>
						  </div>
						  <!-- Основное содержимое модального окна -->
						<form id = "model">
						  <div class="modal-body" >
								<input type="text" autofocus name="nametable" placeholder="Введите название таблицы" required size="25" style="margin-right:10px;"></p>
								<input type="text" autofocus name="mod0" placeholder="Введите название столбца"required size="25" style="margin-right:10px;">
								<select type = "text" name="list0">
									<option value = "tex">Текст&emsp;</option>
									<option value = "int">Число&emsp;</option>
								</select>
								<div id = "pole0"></div></p>
								<button type="button" id="butt"  class="btn btn-primary">Добавить</button>
						  </div>
						  <!-- Футер модального окна -->
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
							<button type="button" id = "truns" class="btn btn-primary" data-dismiss="modal">Создать</button>
						  </div>
						 </form>
						</div>
					  </div>
					</div>
					
				<!-- ДИАЛОГОВОЕ СООБЩЕНИЕ -->	
					<div id="myModalBox1" class="modal fade">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Заголовок модального окна -->
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Информация</h4>
						  </div>
						  <!-- Основное содержимое модального окна -->
						  <div class="modal-body " >
							Таблица удалена
						  </div>
						  <!-- Футер модального окна -->
						  <div class="modal-footer">
						  </div>
						</div>
					  </div>
					</div>
					
					<!-- Добавить столбец -->	
					<div id="myModalBoxADD" class="modal fade">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <!-- Заголовок модального окна -->
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Добавление столбца</h4>
						  </div>
						  <!-- Основное содержимое модального окна -->
							<form id = "adder">
								<div class="modal-body " >
									<input type="text" autofocus name="column" placeholder="Введите название столбца"required size="25" style="margin-right:10px;">
									<select type = "text" name="listok">
									<option value = "char">Текст&emsp;</option>
									<option value = "int">Число&emsp;</option>
									</select>
								</div>
							  <!-- Футер модального окна -->
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
								<button type="button" id = "add" class="btn btn-primary">Добавить</button>
							  </div>
							</form>
						</div>
					  </div>
					</div>
					
					
					<!-- удалить столбец -->	
					<div id="myModalBoxDEL" class="modal fade">
					  <div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
						  <!-- Заголовок модального окна -->
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Удаление столбца</h4>
						  </div>
						  <!-- Основное содержимое модального окна -->
						  <form id = "deler">
							  <div class="modal-body " >
								<h5>Выберите столбец</h5>

								<div id = "dory"></div>
							  </div>
						  </form>
						  <!-- Футер модального окна -->
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
							<button type="button" id = "del" class="btn btn-danger" data-dismiss="modal" >Удалить</button>
						  </div>
						 
						</div>
					  </div>
					</div>
					
					<!-- Изменить имя столбца -->	
					<div id="myModalBoxRE" class="modal fade">
					  <div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
						  <!-- Заголовок модального окна -->
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Переименовать столбец</h4>
						  </div>
						  <!-- Основное содержимое модального окна -->
						  <form id = "rename">
							  <div class="modal-body " >
								<h5>Выберите столбец</h5>
								<div id = "dron"></div>
								<p><input type="text" autofocus name="newcolumn" placeholder="NEW название"required size="20">
								<select type = "text" name="spis">
									<option value = "varchar(255)">Текст&emsp;</option>
									<option value = "int">Число&emsp;</option>
								</select>
							  </div>
						  </form>
						  <!-- Футер модального окна -->
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
							<button type="button" id = "rec" class="btn btn-primary" data-dismiss="modal" >Переименовать</button>
						  </div>
						</div>
					  </div>
					</div>
				
				<a href="#myModalBox" class="btn btn-success" data-toggle="modal">Создать таблицу</a>
				<!-- Выпадающее меню-->
					<!-- Одна кнопка -->
					<div class="btn-group">
						<button type="button" id = "btn" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name ="dar">
						Таблицы <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
						<li><div id = "block"></div></li>
						</ul>
					</div>
					
					<!-- Таблица событий  -->
					<button type="button" id="log"  class="btn btn-warning">Журнал изменений</button>
				<br>
			</center>
			<div id="vol"></div>
			<center>
				<a type="button"  href="/logout.php">Выйти</a>
			</center>
		<?php else:
			include "index.php";
			exit;	
		?>
		<?php endif; ?>
		

		<script src="js/dropdown.js"></script>
		<script src="js/modal.js"></script>
		<script src="dist/css/bootstrap.min.js"></script>
	</body>
</html>