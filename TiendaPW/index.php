<?php

    // Empezar sesión
    session_start();

    require_once('CrearBd.php');
    require_once('Componente.php');

    // Crear instancia de la clase CrearBd
    $BD = new CrearBd(dbname:"collectordb", tabla:"Articulos");

    if(isset($_POST['añadir'])) {
        // print_r($_POST['id_articulo']);
        if(isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], "id_articulo");
            
            if(in_array($_POST['id_articulo'], $item_array_id)) {
                echo "<script>alert('El producto ya esta en el carrito')</script>";
                echo "<script>window.location='index.php'</script>";
            }else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id_articulo' => $_POST['id_articulo']
                );

                $_SESSION['cart'][$count] = $item_array;
            }

        }else{
            $item_array = array(
                'id_articulo' => $_POST['id_articulo']
            );

            // Crear nueva variable de session
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php require_once("header.php");?>
                                                
    <main class="contenedor">
        <div class="grid">           
                <?php
                    $result = $BD->getData();
                    while($row = mysqli_fetch_assoc($result)) {
                        componente($row['articulo'], $row['precio'], $row['imagen'], $row['existencias'], $row['id'] );
                    }
                ?>
            
            

            <!--.producto-->
            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>

        </div>
    </main>
    <footer class="footer">
        <p class="footer__texto">Collector's Isle - Todos los derechos reservados 2022.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>