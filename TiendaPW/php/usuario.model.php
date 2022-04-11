<?php
class UsuarioModel
{
    private $pdo;

    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=collectordb', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

     public function RegistrarUsuario(Usuario $data)
     {
         try
         {
             $sql = "INSERT INTO usuarios ( CORREO, PASSWORD ) VALUES ( ?, ? );";
			 this->pdo->prepare($sql)->execute(
				 array(
					$data->_GET('Correo'),
					$data->_GET('Password')
				 	  )
				 );
         } catch (Exception $e)
		 {
			 die($e->getMessage());
		 }
     }
	}