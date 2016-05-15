$(function(){

	$('#guardar').click(function(){
		
		var nom = $("#nombre").val();
		$.ajax({
			data:  { "nombre" : nom},
			url: 'user/guardar',
			type: 'post',
			success: function (respuesta){
				alert(respuesta);
			}
		});
	});

	function listar(){

		$.ajax()
	}




});//fin function