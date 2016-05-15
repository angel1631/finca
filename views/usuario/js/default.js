$(document).ready(function(){

	window.onload = function(){
		//("carg");
		jornadas();
		puestos();
	};

	function jornadas(){

		$.ajax({
			url:"usuario/jornadas",
			success: function(res){
				$("#slt_jornadas").append(res);
				$("#slt_Ejornada").append(res);
				$("#slt_Rjornada").append(res);
			}
		});
	}

	function puestos(){
		$.ajax({
			url:"usuario/puestos",
			success: function(res){
				$("#slt_puestos").append(res);
				$("#slt_Epuesto").append(res);
				$("#slt_Rpuesto").append(res);
			}
		});	
	}


	$("#btn_prueba").click(function(){
		//alert("javier");
		var datos = {nombre: $("#txt_nombre").val(), apellido: $("#txt_apellido").val(), jornada: $("#slt_jornadas").val(), puesto: $("#slt_puestos").val()};
		var datos_json = JSON.stringify(datos);
		
		//enviar = {values: datos_json};
		
		enviar = {values: datos_json};
		$.ajax({
			type:"POST",
			data: enviar,
			url:"usuario/prueba",
			dataType:"json",
			success: function(res){
				alert(res.msj);
			}, 
			error:function(xhr, status){
				alert(status);
			}
		});
	});	

	
	$("#btn_guardar").click(function(){
		
		//alert($('input:checkbox[name=colorfavorito]:checked').val());
		
		var datos = {nombre: $("#txt_nombre").val(), apellido: $("#txt_apellido").val(), jornada: $("#slt_jornadas").val(), puesto: $("#slt_puestos").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/guardar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});
	});

	$("#qr").click(function(){
		qr();
	});

	function qr(){
		$.ajax({
			url:"usuario/qr",
			success: function(res){
				$("#dv_qr").append(res);
				//alert(res);
				//console.log(res);
			}
		});	
	}





	$("#btn_operar").click(function(){


		var datos = [];

		//datos.push({'usuario':'19940803', 'hora':'2016-03-25 06:42:45', 'entrada':'1'});
		//datos.push({'usuario':'19940803', 'hora':'2016-03-25 15:42:45', 'entrada':'0'});

		datos.push({'usuario':'19940806', 'inicio':'2016-03-25 06:42:45', 'fin':'2016-03-25 15:42:45'});



		var datos_json = JSON.stringify(datos)
		
		
	enviar = {values: datos_json};
	console.log(enviar);
	//alert("va");
			$.ajax({
			type: "POST",
			data: enviar,
			url:"marcaje/guardar",
			dataType:"json",
			success: function(res){
				alert(res.msj);
			}

		});

	});
	
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
			url:"usuario/buscar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					//alert(res.ingreso);
					//alert(res.datos[0]['id']);
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

	//mostrarVentana();

			
			//$("#tb_busqueda").append("<tr><td>12243</td><td>messi</td><td>morales</td><td class = 'javier' id = 'messi' >editar</td></tr>");


			//select_editar();
		
	});

	function llenar_modal(datos, largo){
		for(var i = 0; i<largo; i++){
			$("#tb_body").append("<tr><td>"+datos[i]['id']+"</td><td>"+datos[i]['nombre']+"</td><td>"+datos[i]['apellido']+"</td><td class = 'javier' id = '"+datos[i]['id']+"' >editar</td></tr>");
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
				url:"usuario/buscar_id",
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

	

	//funcion que reciba por parametro el codigo ha buscar 

	function llenar_editar(datos, largo){
		for(var i = 0; i<largo; i++){
			$("#txt_Ecodigo").val(datos[i]['id']);
			$("#txt_Enombre").val(datos[i]['nombre']);
			$("#txt_Eapellido").val(datos[i]['apellido']);
			$("#txt_Eingreso").val(datos[i]['ingreso']);
			//puesto slt_Epuesto
			$("#slt_Epuesto").val(datos[i]['puesto']).attr("selected");
			$("#txt_salario").val(datos[i]['salario']);
			$("#slt_Ejornada").val(datos[i]['jornada']).attr("selected");
			//jornada slt_Ejornada




		}

		

		
	}
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
	//guardar los cambios del update

	$("#btn_update").click(function(){

		
		var datos = {id: $("#txt_Ecodigo").val(), nombre: $("#txt_Enombre").val(), apellido: $("#txt_Eapellido").val(), jornada: $("#slt_Ejornada").val(), puesto: $("#slt_Epuesto").val(), ingreso: $("#txt_Eingreso").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/actualizar",
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
		$("#txt_Enombre").val("");
		$("#txt_Eapellido").val("");
		$("#txt_salario").val("");

		document.getElementById("dv_edicion").style.display = 'none';
	}

	//seccion de reportes 

	$("#slt_Rtipo").change(function(){
		if($("#slt_Rtipo").val() == "1"){
			$("#dv_Rfecha").show();
			$("#dv_Rpuesto").hide();
			$("#dv_Rjornada").hide();

		}
		else if($("#slt_Rtipo").val() == "2"){
			$("#dv_Rfecha").hide();
			$("#dv_Rpuesto").show();
			$("#dv_Rjornada").hide();
		}
		else if($("#slt_Rtipo").val() == "3"){
			$("#dv_Rfecha").hide();
			$("#dv_Rpuesto").hide();
			$("#dv_Rjornada").show();
		}

	});
//consulta para las fechas select * from usuario WHERE ingreso >= '2016-03-12' AND ingreso <= '2016-03-25'
	$("#btn_reporte").click(function(){
		//alert($("#txt_Rfecha_inicio").val());
		//reporte_fechas();
		//reporte_jornadas();
		//reporte_puestos();
		if($("#slt_Rtipo").val() == "1"){
			reporte_fechas();
		}
		else if($("#slt_Rtipo").val() == "2"){
			reporte_puestos();
		}
		else if($("#slt_Rtipo").val() == "3"){
			reporte_jornadas();
		}
	});

	function reporte_fechas(){
		var datos = {inicio: $("#txt_Rfecha_inicio").val(), fin: $("#txt_Rfecha_fin").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/reporte_fecha",
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
					$("#cpt_reporte").append("Reporte de ingresos del "+$("#txt_Rfecha_inicio").val()+" al "+$("#txt_Rfecha_fin").val());

				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});
	}

	function reporte_jornadas(){
		var datos = {jornada: $("#slt_Rjornada").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};
		$("#cpt_reporte").append("Reporte de la Jornada ");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/reporte_jornada",
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
					$("#cpt_reporte").append("Reporte de la jornada "+res.jornada);

				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});

	}

	function reporte_puestos(){
		var datos = {puesto: $("#slt_Rpuesto").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};
		//$("#cpt_reporte").append("Reporte de la Jornada ");
		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/reporte_puesto",
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
					$("#cpt_reporte").append("Reporte del puesto "+res.puesto);

				}
				else{
					alert("No se encontraron registros");
				}
				
			}

		});

	}

});

