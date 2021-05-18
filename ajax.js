// ТАБЛИЦА 
$(document).ready(function() {
  $("#bta").click(function() {
    // задаем функцию при нажатиии на элемент <button>
    $.ajax({
      method: "POST", // метод HTTP, используемый для запроса
      url: "screen.php", // строка, содержащая URL адрес, на который отправляется запрос
      data: $("#form :input").serialize(),
      success: function(msg) {
        // получен ответ сервера
        $("#vivod").html(msg);
      }
    });
  });
});


// ВЫПАДАЮЩЕЕ МЕНЮ
$(document).ready(function() {
  $("#btn").click(function() {
    // задаем функцию при нажатиии на элемент <button>
    $.ajax({
      method: "POST", // метод HTTP, используемый для запроса
      url: "spisok_table.php", // строка, содержащая URL адрес, на который отправляется запрос
      data: $("#plan :input").serialize(),
      success: function(msg) {
        // получен ответ сервера
        $("#block").html(msg);
      }
    });
  });
});
