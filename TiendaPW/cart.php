
<?php
    session_start();

    require_once("CrearBd.php");
    require_once("Componente.php");

    $BD = new CrearBd(dbname:"collectordb", tabla:"Articulos"); 

    if(isset($_POST['remover'])) {
        if($_GET['action']=='remove') {
            foreach($_SESSION['cart'] as $key=>$value) {
                if($value["id_articulo"]==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('El articulo ha sido removido del carrito')</script>";
                    echo "<script>window.location='cart.php'</script>";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user scalabe=no, initial-scale=1.0, maximum-scale=1">
        <meta http-equiv="X-UA-COMPATIBLE" content="ie=edge">
        <title>Carrito</title>
        <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body class="bg-light">
    <?php require_once("header.php");?>

        <div class="container">
            <div class="row px-5">
                <div class="col-md-7">
                    <div class="shopping-cart">
                        <h6>Mi carrito</h6>
                        <hr>

                        <?php
                            
                            $total = 0;

                            if(isset($_SESSION['cart'])) {
                                $id_articulo = array_column($_SESSION['cart'], "id_articulo");
                            
                                $resultado = $BD->getData();
                                while($row = mysqli_fetch_assoc($resultado)) {
                                    foreach($id_articulo as $id) {
                                        if($row['id']==$id) {
                                            elementoCarro($row['imagen'], $row['articulo'], $row['precio'], $row['id']);
                                            $total = $total + (int)$row['precio'];
                                        }
                                    }
                                }
                            }else{
                                echo "<h5>El carrito esta vacío</h5>";
                            }

                        ?>
                        
                    </div>
                </div>   
                <div class="col-md-4 offset-md-1 border rounder mt-5 bg-white h-25">

                    <div class="pt-4">
                        <h6>Detalles y precio</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                    if(isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "<h6>Precio ($count articulos)</h6>";
                                    }else{
                                        echo "<h6>Precio (0 articulos)</h6>";
                                    }
                                ?>
                                <h6>Cargos de entrega</h6>
                                <hr>
                                <h6>Total a pagar</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>$<?php echo $total; ?></h6>
                                <h6 class="text-success">Gratis</h6>
                                <hr>
                                <h6>$<?php
                                    echo $total;
                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
            </div>    
        </div>
        <footer class="footer">
            <p class="footer__texto">Collector's Isle - Todos los derechos reservados 2022.</p>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>