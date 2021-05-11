
//ДОБАВЛЕНИЕ АТРИБУТА 
var x = 0;
$( document ).ready(function(){
	$( "#butt" ).click(function(){ // задаем функцию при нажатиии на элемент <button>

		if (x < 20) {
			var str ='<input type="text" autofocus required name="mod' + (x+1) + '" placeholder="Введите название столбца" size="25" style="margin-right:10px;"><select type = "text" name="list' + (x+1) + '"><option value = "tex" >Текст... </option><option value = "int" >Число... </option></select><div id = "pole' + (x+1) +'"></div>';
			document.getElementById('pole' + x).innerHTML = str;
			x++;
		} else
		{
			alert('STOP it!');
		}
	});
});



//ДОБАВЛЕНИЕ ТАБЛИЦЫ
$( document ).ready(function(){
	$( "#truns" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "create_table.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  $('#model').serialize(),
			success: function(msg) { // получен ответ сервера  
				$('#vol').html(msg);
			}
		});
	});
});	


// ВЫПАДАЮЩЕЕ МЕНЮ
$( document ).ready(function(){
	$( "#btn" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "spisok_table.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  $('#plan :input').serialize(),
			success: function(msg) { // получен ответ сервера  
				$('#block').html(msg);
			}
		});
	});
});	

// ДОБАЛЕНИЕ СТОЛБЦА
$( document ).ready(function(){
	$( "#add" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "addcolumn.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  $('#adder').serialize(),
			success: function(msg) { // получен ответ сервера  
				$('#vol').html(msg);
			}
		});
	});
});	

// ПЕРЕИМЕНОВАНИЕ СТОЛБЦА
$( document ).ready(function(){
	$( '#rec' ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "Renamecolumn.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  $('#rename').serialize(),
			success: function(msgw) { // получен ответ сервера  
				$('#vol').html(msgw);
			}
		});
	});
});	

//УДАЛЕНИЕ СТОЛБЦА
$( document ).ready(function(){
	$( "#del" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "deletecolumn.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  $('#deler').serialize(),
			success: function(msg) { // получен ответ сервера  
				$('#vol').html(msg);
			}
		});
	});
});	




