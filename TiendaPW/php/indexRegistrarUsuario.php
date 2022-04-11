<?php
require_once 'usuario.entidad.php';
require_once 'usuario.model.php';

$usu = new Usuario();
$uModel = new UsuarioModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'registrar':
			$usu->__SET('Correo',  $_REQUEST['Correo']);
			$usu->__SET('Password',        $_REQUEST['Password']);

			$model->RegistrarUsuario($usu);
			header('Location: indexRegistrarUsuario.php');
			break;

		case 'login':
			echo '<script>alert("Ya existe una cuenta con ese correo!!")</script>';

	}
}
?>
