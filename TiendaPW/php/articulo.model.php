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

				$art->__SET('id', $r->ID);
				$art->__SET('NombreArticulo', $r->NOM_ARTICULO);
				$art->__SET('Precio', $r->PRECIO);
				$art->__SET('Existencias', $r->EXISTENCIAS);
				$art->__SET('NumeroPiezas', $r->NUM_PIEZAS);

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
			          ->prepare("SELECT * FROM articulos WHERE ID = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$art = new Articulo();

				$art->__SET('id', $r->ID);
				$art->__SET('NombreArticulo', $r->NOM_ARTICULO);
				$art->__SET('Precio', $r->PRECIO);
				$art->__SET('Existencias', $r->EXISTENCIAS);
				$art->__SET('NumeroPiezas', $r->NUM_PIEZAS);			

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
						NOM_ARTICULO   = ?, 
						PRECIO         = ?,
						EXISTENCIAS    = ?, 
						NUM_PIEZAS   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('NombreArticulo'), 
					$data->__GET('Precio'), 
					$data->__GET('Existencias'),
					$data->__GET('NumeroPiezas'),
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
		$sql = "INSERT INTO articulos (NOM_ARTICULO,PRECIO,EXISTENCIAS,NUM_PIEZAS) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('NombreArticulo'), 
				$data->__GET('Precio'), 
				$data->__GET('Existencias'),
				$data->__GET('NumeroPiezas')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}