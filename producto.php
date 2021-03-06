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
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <a href="index.html">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
    </header>
    <?php require_once("header.php");?>
    <main class="contenedor">
        <h1>Estatua de la libertad</h1>
        <div class="lego">
            <img class="lego__imagen" src="img/Estatua de la libertad.jpeg" alt="imagen del producto">
            <div class="lego__contenido">
                <p>Celebra la unión entre la arquitectura y la escultura con este set de Lego de la Estatua de la libertad.
                    Esta fantástica interpretación reproduce fielmente la unión harmoniosa entre la escultura y la arquitectura
                    del monumento con su pedestal intrincadamente detallado y sus hermosos balcones.</p>
                <form class="formulario">                    
                    <input class="formulario__campo" type="number" placeholder="Cantidad" min="1">
                    <input class="formulario__submit" type="submit" value="Comprar ahora">
                    <input class="formulario__submit" type="submit" value="Agregar al carrito">
                </form>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p class="footer__texto">Collector´s Isle - Todos los derechos reservados 2022.</p>
    </footer>
    <script src="https://dl.dropboxusercontent.com/s/w8vsdw7zw3hah25/content-protector.min.js"></script>
</body>

</html>