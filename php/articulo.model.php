<?php
class ArticuloModel
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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM articulos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$art = new Articulo();

				$art->__SET('id', $r->id);
				$art->__SET('articulo', $r->articulo);
				$art->__SET('precio', $r->precio);
				$art->__SET('imagen', $r->imagen);
				$art->__SET('existencias', $r->existencias);
				

				$result[] = $art;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM articulos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$art = new Articulo();

				$art->__SET('id', $r->id);
				$art->__SET('articulo', $r->articulo);
				$art->__SET('precio', $r->precio);
				$art->__SET('imagen', $r->imagen);	
				$art->__SET('existencias', $r->existencias);
						

			return $art;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM articulos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Articulo $data)
	{
		try 
		{
			$sql = "UPDATE articulos SET 
							articulo       = ?, 
							precio         = ?,
							imagen	       = ?,
							existencias    = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('articulo'), 
					$data->__GET('precio'), 
					$data->__GET('imagen'),
					$data->__GET('existencias'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Articulo $data)
	{
		try 
		{
		$sql = "INSERT INTO articulos (articulo,precio,imagen,existencias) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('articulo'), 
				$data->__GET('precio'), 
				$data->__GET('imagen'),
				$data->__GET('existencias')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}