<?php
require_once 'articulo.entidad.php';
require_once 'articulo.model.php';

// Logica
$art = new Articulo();
$model = new ArticuloModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$art->__SET('id',            $_REQUEST['id']);
			$art->__SET('NombreArticulo',  $_REQUEST['NombreArticulo']);
			$art->__SET('Precio',        $_REQUEST['Precio']);
			$art->__SET('Existencias',   $_REQUEST['Existencias']);
			$art->__SET('NumeroPiezas',    $_REQUEST['NumeroPiezas']);

			$model->Actualizar($art);
			header('Location: index.php');
			break;

		case 'registrar':
			$art->__SET('NombreArticulo',  $_REQUEST['NombreArticulo']);
			$art->__SET('Precio',        $_REQUEST['Precio']);
			$art->__SET('Existencias',   $_REQUEST['Existencias']);
			$art->__SET('NumeroPiezas',    $_REQUEST['NumeroPiezas']);

			$model->Registrar($art);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$art = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Collector CRUD</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="action=<?php echo $art->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $art->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre del Articulo</th>
                            <td><input type="text" name="NombreArticulo" value="<?php echo $art->__GET('NombreArticulo'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Precio</th>
                            <td><input type="text" name="Precio" value="<?php echo $art->__GET('Precio'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Existencias</th>
                            <td><input type="number" name="Existencias" value="<?php echo $art->__GET('Existencias'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Numero de Piezas</th>
                            <td><input type="text" name="NumeroPiezas" value="<?php echo $art->__GET('NumeroPiezas'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre del Articulo</th>
                            <th style="text-align:left;">Precio</th>
                            <th style="text-align:left;">Existencias</th>
                            <th style="text-align:left;">Numero de Piezas</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('NombreArticulo'); ?></td>
                            <td><?php echo $r->__GET('Precio'); ?></td>
                            <td><?php echo $r->__GET('Existencias'); ?></td>
                            <td><?php echo $r->__GET('NumeroPiezas'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>