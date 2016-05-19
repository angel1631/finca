
<!--<script src="jquery-1.11.3.min.js"></script>-->
	<script src="qr/jquery.qrcode-0.12.0.js"></script>
<STYLE TYPE="text/css">
	
	.javier {color:blue;}
</STYLE>

<div>
	<button id="mn_nuevo">Nuevo</button><button id="mn_editar">Editar</button><button id="mn_reporte">Reporte</button>
</div>

<div id="dv_nuevo" style='display:block;'>
<h1>Registro de Empleado Nuevo</h1>
<br/>
<br/>

<div>
	<label>Nombres</label><input id="txt_nombre" type="text">
	<label>Apellildos</label><input id="txt_apellido" type="text">
	<select id="slt_jornadas">

	</select>
	<select id="slt_puestos">
	</select>
	
</div>


<div id="dv_qr">
	<!--<button id="btn_prueba">prueba</button>-->

</div>


<br>
<br>

	<button id="btn_guardar">Guardar</button>

</div>


<div id="dv_editar" style='display:none;'>
	<h1>Editar Empleado</h1>
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
	

	
	<div id ="dv_edicion" style="display:none;">

		<label>Codigo</label><input type="text" readonly="readonly" id="txt_Ecodigo"/>
		<br/>
		<br/>
		<label for="txt_Enombre">Nombre</label><input type="text" id="txt_Enombre" />
		<br/>
		<br/>
		<label for="">Apellido</label><input type="text" id="txt_Eapellido"/>
		<br/>
		<br/>
		<label>Ingreso:</label><input type="text" id="txt_Eingreso" readonly="readonly">
		<br/>
		<br/>
		<label for="">Puesto</label>	
		<select id="slt_Epuesto">

		</select>
		<br/>
		<br/>
		<label for="">Salario</label><input type="text" id="txt_salario" readonly="readonly"/>
		<br/>
		<br/>
		<label for="">Jornada</label>
			<select id="slt_Ejornada">

		</select>
		
		
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
					<th>Apellido</th>
					<th>editar</th>
				</tr>

			</thead>
			<tbody id="tb_body">

			</tbody>
			
		</table>
	</div>
</div>
	
</div>


<div id="dv_reporte" style='display:none;'>
	<h1>Reporte de Empleados Activos</h1>
	<br/>
	<br/>

	<div>
		<label>Seleccione el tipo:</label>
		<select id="slt_Rtipo">
			<option value="0">Seleccione:</option>
			<option value="1">Fechas Ingreso</option>
			<option value="2">Puestos</option>
			<option value="3">Jornadas</option>
		</select>
		<br/>
	</div>
	<div>
		<div id="dv_Rfecha" style='display:none'>
			<label>Entre el: </label><input type="date" id="txt_Rfecha_inicio"/> <label>y el:</label><input type="date" id="txt_Rfecha_fin"/>

		</div>
		<div id="dv_Rpuesto" style='display:none'>
			<select id="slt_Rpuesto">
			</select>

		</div>
		<div id="dv_Rjornada" style='display:none'>
			<select id="slt_Rjornada">
			</select>
		</div>
		<br/>
		<br/>

		<button id="btn_reporte">Generar</button>
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
	<br>
	<br>
	

</div>
<center>
		<div id="divQR"></div>
	</center>	