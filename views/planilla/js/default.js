$(document).ready(function(){

	window.onload = function(){
		//("carg");
		
		puestos();
		planillas();
	};


	function puestos(){
		$.ajax({
			url:"planilla/puestos",
			success: function(res){
				$("#slt_puestos").append(res);
			}
		});	
	}


	$("#btn_prueba").click(function(){
		var datos = {nombre: $("#txt_nombre").val(), puesto: $("#slt_puestos").val(), mes: $("#slt_meses").val(), anio: $("#slt_anios").val()};
		var datos_json = JSON.stringify(datos);
		
		enviar = {values: datos_json};
		$.ajax({
			type: "POST",
			data: enviar,
			url:"planilla/prueba",
			dataType:"json",
			success: function(res){
				if(res.cod ==2){
					alert(res.mensaje);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			},
			error: function(xhr, status){
				alert(status);
			}

		});
	});

	$("#btn_generar").click(function(){
		//alert("d");

		var datos = {nombre: $("#txt_nombre").val(), puesto: $("#slt_puestos").val(), mes: $("#slt_meses").val(), anio: $("#slt_anios").val()};
		var datos_json = JSON.stringify(datos);
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"planilla/generar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			},
			error: function(xhr, status){
				alert(status);
			}

		});
	});


	function planillas(){
		//alert("dd");
		$.ajax({
			url:"planilla/getplanillas",
			success: function(res){
				$("#slt_planillas").append(res);
				//alert(res);
			}
		});	
	}

		$("#d").click(function(){
			planillas();
	});



//mandos del menu 

	$("#mn_nuevo").click(function(){
		//$("#dv_editar").hide();
		$("#dv_nuevo").show();
		$("#dv_reporte").hide();
	});

	
	$("#mn_reporte").click(function(){
		//$("#dv_editar").hide();
		$("#dv_nuevo").hide();
		$("#dv_reporte").show();
	});




});