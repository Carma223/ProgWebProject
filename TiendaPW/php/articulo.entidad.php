<?php
class Articulo
{
	private $id;
	private $NombreArticulo;
	private $Precio;
	private $Existencias;
	private $NumeroPiezas;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}