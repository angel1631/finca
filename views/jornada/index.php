
<STYLE TYPE="text/css">
	
	.javier {color:blue;}
</STYLE>
<div>
	<button id="mn_nuevo">Nuevo</button><button id="mn_editar">Editar</button><button id="mn_reporte">Reporte</button>
</div>

<div id="dv_nuevo" style="display:block">
<h1>Registro de Jornada</h1>
<br>
<br>

<div>
	<label>Jornada</label><input id="txt_titulo" type="text">
	<label>Inicia</label><input id="txt_inicia" type="time">
	<label>Finaliza</label><input id="txt_finaliza" type="time">
	<label>Hora Extra</label><input id="txt_hora" type="number" step="any">
	
</div>



<br>
<br>

	<button id="btn_guardar">Guardar</button>

</div>


<div id="dv_editar" style="display:none">
	<h1>Editar Jornada</h1>
	<br/>
	<br/>

	<div id="dv_buscador">
			<?php //style='display:none;'?>
		<label for="txt_buscar">Buscar</label><input type="text" id="txt_buscar"/>
		
		
		<br/>
		<br/>
		<button id="btn_buscar">Buscar</button>
	</div>

	<div id ="dv_edicion" style="display:none;">

		<label>Codigo</label><input type="text" readonly="readonly" id="txt_Ecodigo"/>
		<br/>
		<br/>
		<label for="txt_Etitulo">Nombre</label><input type="text" id="txt_Etitulo" />
		<br/>
		<br/>
		<label for="">Inicia</label><input  id="txt_Einicia" type="time" />
		<br/>
		<br/>
		<label>Finaliza</label><input  id="txt_Efin" type="time"/>
		<br/>
		<br/>
		<label>Incremento Hora</label><input id="txt_Eincremento" type="number" step="any">
		
		
		
		<button id="btn_update">Guardar Cambios</button>
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
					<th>Editar</th>
				</tr>

			</thead>
			<tbody id="tb_body">

			</tbody>
			
		</table>
	</div>
</div>
	


</div>


<div id="dv_reporte" style='display:none;'>
	<h1>Reporte de Jornadas</h1>
	<br/>
	<br/>
	<div>
		<label>Seleccione el tipo:</label>
		<select id="slt_Rtipo">
			<option value="0">Seleccione:</option>
			<option value="1">Activos</option>
			<option value="2">No Activos</option>
			
		</select>
		<br/>
	

	</div>

	<div>
		<table  border='6' style='width: 50%px;' align='center'>
			<caption id='cpt_reporte'></caption>
			<thead bgcolor='#58ACFA' id="tb_Rcabesa">

			</thead>

			<tbody id="tb_Rbody">

			</tbody>

		</table>
	</div>
</div>

