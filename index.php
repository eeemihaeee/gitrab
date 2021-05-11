<?php include "Table_maslo.php"; ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>База данных</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" >
		<link rel="stylesheet" href="CSS/Style.css">	
    </head>
	
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<!-----------------------Проверка входа в сессию при авторизации----------------------------->
		<?php if(isset($_COOKIE['user'])):?>
			<!-- Навбар-->
			<ul class="nav nav-tabs">
				<li role="navigation" class="active" ><a href="#">Запросы MySQL</a></li>
				<li role="navigation"><a href="/users.php">Базы данных</a></li>
			</ul>
			
			
			<!-- Форма вывода запроса-->
			<div id = "form">
				<center>
					<p>
					<p><input type="text" autofocus name="user" placeholder="Введите запрос" size="100"></p>
					<p>
						<button type="button" id ="bta" class="btn btn-primary">Отправить</button>
						<input type="reset" class="btn btn-danger" value="Отмена">
					</p>	
				</center>	
			</div>
			<div id = "vivod"></div>
			
			
			<!-- Выпадающее меню-->
			<div id = "plan">
				<!-- Одна кнопка -->
				<div class="btn-group">
					<button type="button" id = "btn" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name ="dar" style="margin-left:30px; ">
					Таблицы <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" style="margin-left:30px; ">
					<li class="dropdown-item"> <div id = "block"></div></li>
				  </ul>
				</div>
			</div>
			<br>
			<div id="vol"></div>
			<center>
				<a type="button"  href="/logout.php">Выйти</a>
			</center>
			
		<!-----------------------Если мы еще не атаризованы ----------------------------->
		<?php else: ?>
			<center>
				
				<!------------------------------ Форма Авторизация -------------------------->
				<form action="autorise.php" method = "POST"> 
					<h3>Добро пожаловать на наш сайт!</h3>
					<h5>Авторизируйтесь, чтобы начать работу</h5>
					<div class = "sty1">
						<div id = "Alog" class = "has-error">
							<!---<p><stgong>Логин</stgong></p>--->
							<input type = "text" placeholder="Введите логин" id ="Asugar" name = "sugar">
							<span id ="msg1" class = "glyphicon glyphicon-remove"></span>
						</div>
						<br>
						<div id = "Apor" class = "has-error">
							<!---<p><stgong>Пароль</stgong></p>--->
							<input type = "password" placeholder="Введите пароль" id = "Acheese" name = "cheese">
							<span id ="msg2" class = "glyphicon glyphicon-remove"></span>
						</div>
						<br>
						<p>
							<button type = "submit" id="Abut" disabled = "false" name = "go" class="btn btn-primary">Войти</button>
						</p>
					</div>
				</form>
			
				<!------------------------------ Переход к Регистрации------------------------->
				<h6>Если у вас нет аккаунта, вы можете создать его, перейдя по ссылке <br>
				<a type="button"  href="/signup.php">Регистрация</a></h6>
			</center>
		<?php endif; ?>

		<script src = "ajax.js"></script>
		<script src="js/dropdown.js"></script>
		<script src="dist/css/bootstrap.min.js"></script>
		<script src = "Auto-registr.js"></script>
	</body>
</html> 