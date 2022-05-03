<?php
class Articulo
{
	private $id;
	private $articulo;
	private $precio;
	private $imagen;
	private $existencias;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}