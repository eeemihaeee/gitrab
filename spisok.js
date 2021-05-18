//РЕДАКТИРОВАНИЕ (УДАЛЕНИЕ, ДОБАВЛЕНИЕ)
// УДАЛЕНИЕ ТАБЛИЦЫ 
function DeletTable( ogone){
	$( document ).ready(function(){
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "deletetable.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  {pica: ogone},
			success: function(msg) { // получен ответ сервера  
				//$('#myForm').hide('slow');
				str = '';
              	document.getElementById('vol').innerHTML = str;
				$('#myModalBox1').modal('show');
			}
		});
	});
}

//УДАЛЕНИЕ СТРОКИ
function DeletS( ogos){
	$( document ).ready(function(){
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "DeleteST.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  {picd: ogos},
			success: function(msge) { // получен ответ сервера  
				//$('#myForm').hide('slow');
				$('#vol').html(msge);
			}
		});
	});
}



//ДОБАВЛЕНИЕ СТРОКИ
$( document ).ready(function(){
	$( "#batpole" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
		$.ajax({
			method: "POST", // метод HTTP, используемый для запроса
			url: "addpole.php", // строка, содержащая URL адрес, на который отправляется запрос
			success: function(msg) { // получен ответ сервера  
				$('#zapolner').html(msg);
			}
		});
	});
});	



// ВЫПАДАЮЩЕЕ МЕНЮ
$( document ).ready(function(){
	$( "#btnatr" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
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







