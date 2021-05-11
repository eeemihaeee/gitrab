//УДАЛЕНИЕ СТРОКИ
function DeletS( ogos){
	$( document ).ready(function(){
		$.ajax({
			method: "POST", // метод  HTTP, используемый для запроса
			url: "DeleteST.php", // строка, содержащая URL адрес, на который отправляется запрос
			data:  {picd: ogos},
			success: function(msge) { // получен ответ сервера  
				//$('#myForm').hide('slow');
				$('#vol').html(msge);
			}
		});
	});