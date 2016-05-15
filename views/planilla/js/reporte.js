$(document).ready(function(){

	window.onload = function(){
		//("carg");
		
		planillas();
		fd();

	};


	function planillas(){
		alert("dd");
		$.ajax({
			url:"planilla/planillas",
			success: function(res){
				$("#slt_planillas").append(res);
			}
		});	
	}

	function fd(){
		$("#d").click(function(){
		alert("d");
	});

	}

	


});