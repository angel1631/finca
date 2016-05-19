$(document).ready(function(){

	$("#btn_buscar").click(function(){
	
		var texto = $("#txt_buscar").val();
		var buscar_nombre = 0;
		if($("#slt_buscador").val() == 'N'){
			buscar_nombre = 1;
		}
		else {
			buscar_nombre = 0;
		}
		var datos = {nombre: texto, clave: buscar_nombre};
		var datos_json = JSON.stringify(datos);
		
		var enviar = {values: datos_json};
		// alert("javie");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"key/buscar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					//alert(res.datos[0]['id']);
					console.log(res);
					//alert(res.msj);
					$("#tb_body").empty();
					//alert(res.datos.length);
					llenar_modal(res.datos, res.datos.length);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});

	});

	function llenar_modal(datos, largo){
		for(var i = 0; i<largo; i++){
			$("#tb_body").append("<tr><td>"+datos[i]['id']+"</td><td>"+datos[i]['nombre']+"</td><td>"+datos[i]['apellido']+"</td><td class = 'javier' id = '"+datos[i]['id']+"' >Generar</td></tr>");
		}

		mostrarVentana();
		select_editar();

	}

	function mostrarVentana(){
	    var ventana = document.getElementById('miVentana');
	    ventana.style.marginTop = "100px";
	    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";
	    ventana.style.display = 'block';
	}

	function ocultarVentana(){
	    var ventana = document.getElementById('miVentana');
	    ventana.style.marginTop = "100px";
	    ventana.style.left = ((document.body.clientWidth-350) / 2) +"px";
	    ventana.style.display = 'none';
	}


	function select_editar(){
		$(".javier").click(function(){
		//alert("clase ajvei");
		   var ID = $(this).attr("id");
		   //alert(ID);
		 
		   //antes ir a traer los datos 

		   var datos = {clave: ID};
			var datos_json = JSON.stringify(datos);
			
			var enviar = {values: datos_json};
			// alert("javie");
			//aqui ir por el key 
			$.ajax({
				type: "POST",
				data: enviar,
				url:"key/generar",
				dataType:"json",
				success: function(res){
					if(res.cod ==1){
						console.log(res.key);
						alert("La clave es: "+res.key);
	//llenar_modal(res.datos, res.datos.length);
					}
					else{
						alert("ha ocurrido un problema");
					}
					
				}

			});

		 //  document.getElementById("dv_edicion").style.display = 'block';

		});	
	}
});

