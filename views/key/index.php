<STYLE TYPE="text/css">
	
	.javier {color:blue;}
</STYLE>


<div >
	<h1>Generar Key</h1>
	<br/>
	<br/>
	<div id="dv_buscador">
			<?php //style='display:none;'?>
		<label for="txt_buscar">Buscar</label><input type="text" id="txt_buscar"/>
		
		<select id="slt_buscador">
			<option value="N">Nombre</option>
			<option value="C">Codigo</option>
		</select>
		<br/>
		<br/>
		<button id="btn_buscar">Buscar</button>
	</div>
	
<div id="miVentana" style="position:fixed; width:350px; height: 190px; top:0; left:0;   border:#333333 3px solid; background-color: #F8F8FF; color:#000000; display:none;" >
	<div>
		<label>Resultado</label>
	</div>
	<div style="position:fixed"> 
		<table border='1' id="tb_busqueda">
			<thead>

				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Generar</th>
				</tr>

			</thead>
			<tbody id="tb_body">

			</tbody>
			
		</table>
	</div>
</div>
	
</div>