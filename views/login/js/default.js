$(document).ready(function(){

		$("#btn_ingresar").click(function(){
			//alert("va");
			//var ID = $(this).attr("id");
		   //alert(ID);
		 
		   //antes ir a traer los datos 

		   var datos = {nombre: $("#txt_login").val(), clave: $("#txt_pass").val()};
			var datos_json = JSON.stringify(datos);
			
			var enviar = {values: datos_json};
			// alert("javie");
			//aqui ir por el key 
			//alert("va");
			$.ajax({
				type: "POST",
				data: enviar,
				url:"login/entrar",
				dataType:"json",
				success: function(res){
					if(res.cod ==1){
						console.log(res.msj);
						alert(res.msj);
						location.href = 'http://localhost/finca/index'
						//header('location: '.URL.' index');
	//llenar_modal(res.datos, res.datos.length);
					}
					else{
						alert(res.msj);
					}
					
				}

			});
		});
});

//$(document).ready(function(){