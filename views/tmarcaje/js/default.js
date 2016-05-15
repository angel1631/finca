$(document).ready(function(){

	$("#btn_guardar").click(function(){

		var datos = {titulo: $("#txt_tipo").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"tmarcaje/guardar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});
	});
});