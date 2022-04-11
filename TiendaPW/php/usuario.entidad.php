<?php
class Usuario
{
	private $Id;
	private $Correo;
	private $Password;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}