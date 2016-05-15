
$(document).ready(function(){



	$("#btn_guardar").click(function(){
		
		var datos = {titulo: $("#txt_titulo").val(), inicia: $("#txt_inicia").val(), finaliza:$("#txt_finaliza").val(), hora:$("#txt_hora").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};
		//alert("d");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"jornada/guardar",
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

	//mandos del menu
	$("#mn_nuevo").click(function(){
		$("#dv_editar").hide();
		$("#dv_nuevo").show();
		$("#dv_reporte").hide();
	});

	$("#mn_editar").click(function(){
		$("#dv_nuevo").hide();
		$("#dv_editar").show();
		$("#dv_reporte").hide();
	});

	$("#mn_reporte").click(function(){
		$("#dv_editar").hide();
		$("#dv_nuevo").hide();
		$("#dv_reporte").show();
	});


	$("#btn_buscar").click(function(){
		var texto = $("#txt_buscar").val();
		
			

		var datos = {nombre: texto};
		var datos_json = JSON.stringify(datos);
		
		var enviar = {values: datos_json};
		 
		$.ajax({
			type: "POST",
			data: enviar,
			url:"jornada/buscar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					//alert(res.datos[0]['id']);
					//alert(res.msj);
					console.log(res);
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
			$("#tb_body").append("<tr><td>"+datos[i]['id']+"</td><td>"+datos[i]['titulo']+"</td><td class = 'javier' id = '"+datos[i]['id']+"' >editar</td></tr>");
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
			$.ajax({
				type: "POST",
				data: enviar,
				url:"jornada/buscar_id",
				dataType:"json",
				success: function(res){
					if(res.cod ==1){
						//alert(res.ingreso);
						//alert(res.datos[0]['id']);
						//alert(res.datos);
						console.log(res.datos);
						llenar_editar(res.datos, res.datos.length);
						ocultarVentana();
						//limpiar el modal
						$("#tb_body").empty();
						
						//alert(res.datos.length);
						//llenar_modal(res.datos, res.datos.length);
					}
					else{
						alert("ha ocurrido un problema");
					}
					
				}

			});

		   document.getElementById("dv_edicion").style.display = 'block';

		});	
	}

		function llenar_editar(datos, largo){
		for(var i = 0; i<largo; i++){
			$("#txt_Ecodigo").val(datos[i]['id']);
			$("#txt_Etitulo").val(datos[i]['titulo']);
			$("#txt_Einicia").val(datos[i]['inicia']);
			$("#txt_Efin").val(datos[i]['fin']);
			$("#txt_Eincremento").val(datos[i]['hora']);
			
		}
		
	}

	$("#btn_update").click(function(){
		var datos = {id: $("#txt_Ecodigo").val(), nombre: $("#txt_Etitulo").val(), inicia: $("#txt_Einicia").val(), fin: $("#txt_Efin").val(), hora: $("#txt_Eincremento").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};
		//alert("pre");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"jornada/actualizar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					alert(res.msj);
					limpiar_dvEdicion();

				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});

	});

	function limpiar_dvEdicion(){
		$("#txt_Ecodigo").val("");
		$("#txt_Etitulo").val("");
		$("#txt_Einicia").val("");
		$("#txt_Efin").val("");
		$("#txt_Eincremento").val("");

		document.getElementById("dv_edicion").style.display = 'none';
	}

	//seccion de reportes
	$("#slt_Rtipo").change(function(){
		if($("#slt_Rtipo").val() == "1"){//es para los activos
			reporte_activos();
		}
		else if($("#slt_Rtipo").val() == "2"){
			reporte_NoActivos();
		}
	});

	function reporte_activos(){
		$.ajax({
			type: "POST",
			//data: enviar,
			url:"jornada/reporte_activo",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					//alert(res.msj);
					//limpiar_dvEdicion();
					//alert(res.msj);
					$("#tb_Rcabesa").empty();
					$("#tb_Rbody").empty();
					$("#cpt_reporte").empty();

					$("#tb_Rcabesa").append(res.cabesa);
					$("#tb_Rbody").append(res.cuerpo);
					$("#cpt_reporte").append("Reporte de Jornadas Activos");

				}
				else{
					alert("No Hay registros");
				}
				
			}

		});
	}

	function reporte_NoActivos(){
			$.ajax({
			type: "POST",
			//data: enviar,
			url:"jornada/reporte_NoActivo",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					//alert(res.msj);
					//limpiar_dvEdicion();
					//alert(res.msj);
					$("#tb_Rcabesa").empty();
					$("#tb_Rbody").empty();
					$("#cpt_reporte").empty();

					$("#tb_Rcabesa").append(res.cabesa);
					$("#tb_Rbody").append(res.cuerpo);
					$("#cpt_reporte").append("Reporte de puestos No Activos");

				}
				else{
					alert("No hay registros");
				}
				
			}

		});

	}


});
