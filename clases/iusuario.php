<?php

interface iUsuario {

	public function setVariable($name, $var);
	public function getVariable($name);
	public function guardar();
	public function puestos();
	public function jornadas();
	public function save(IORM $orm);


}