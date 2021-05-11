//Проверка формы регистрации 
function proverka()
{
	var Value = $('#sugar').val();
	var Value1 = $('#tomato').val();
	var Value2 = $('#cheese').val();
	if(Value != 0 && Value1 != 0 && Value2 != 0 && Value1 == Value2)
	{
		$('#but').attr('disabled', false);
	}
	else 
	{
		$('#but').attr('disabled', true);
	}
}

$('#sugar').keyup(function(){
	var Value = $('#sugar').val();
	if(Value == 0)
	{
		//$('#errmsg').text("введите значения");
		$('#log').removeClass("has-success").addClass("has-error");
		$('#gly1').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		//$('#errmsg').text("");
		$('#log').removeClass("has-error").addClass("has-success");
		$('#gly1').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	proverka();
});

$('#cheese').keyup(function(){
	var Value = $('#cheese').val();
	if(Value == 0)
	{
		$('#por').removeClass("has-success").addClass("has-error");
		$('#gly2').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		$('#por').removeClass("has-error").addClass("has-success");
		$('#gly2').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
		$('#por2').removeClass("has-success").addClass("has-error");
		$('#gly3').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	proverka();
});

$('#tomato').keyup(function(){
	var Value = $('#tomato').val();
	var Value1 = $('#cheese').val();
	if(Value != 0)
	{
		if(Value != Value1)
		{
			$('#por2').removeClass("has-success").addClass("has-error");
			$('#gly3').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
		}
		else 
		{
			$('#gly3').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
			$('#por2').removeClass("has-error").addClass("has-success");
		}
	}
	proverka();
});

//Проверка формы авторизации

function Aproverka() // Блокировка кнопки ,если поля не заполнены
{
	var Value1 = $('#Asugar').val();
	var Value2 = $('#Acheese').val();
	if( Value1 != 0 && Value2 != 0)
	{
		$('#Abut').attr('disabled', false);
	}
	else 
	{
		$('#Abut').attr('disabled', true);
	}
}

$('#Asugar').keyup(function(){
	var Value = $('#Asugar').val();
	if(Value == 0)
	{
		//$('#errmsg').text("введите значения");
		$('#Alog').removeClass("has-success").addClass("has-error");
		$('#msg1').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		//$('#errmsg').text("");
		$('#Alog').removeClass("has-error").addClass("has-success");
		$('#msg1').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	Aproverka();
});


$('#Acheese').keyup(function(){
	var Value = $('#Acheese').val();
	if(Value == 0)
	{
		$('#Apor').removeClass("has-success").addClass("has-error");
		$('#msg2').removeClass("glyphicon glyphicon-ok").addClass("glyphicon glyphicon-remove");
	}
	else 
	{
		$('#Apor').removeClass("has-error").addClass("has-success");
		$('#msg2').removeClass("glyphicon glyphicon-remove").addClass("glyphicon glyphicon-ok");
	}
	Aproverka();
});








