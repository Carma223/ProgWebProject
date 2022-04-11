<?php

    function componente($articulo, $precio, $imagen, $existencias, $id) {
        $elemento = "

            <div class=\"row text-center py-3\">
            <div>
                <a href=\"producto.html\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$imagen\" alt=\"set\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <p class=\"producto__nombre\">$articulo</p> 
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                            </h6>                              
                                <p class=\"producto__precio\">$$precio</p>                               
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"añadir\">Añadir al carrito <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type='hidden' name='id_articulo' value='$id'>
                        </div>
                    </div>
                </form>
                </a>
            </div>
        </div>

            ";

        echo $elemento;
            
    }

    function elementoCarro($imagen, $articulo, $precio, $id_articulo) {
        $elemento = "

        <form action=\"cart.php?action=remove&id=$id_articulo\" method=\"post\" class=\"cart-items\">
                            <div class=\"border rounder\">
                                <div class=\"row bg-white\">
                                    <div class=\"col-md-3 pl-0\">
                                        <img src=\"$imagen\" alt=\"set\" class=\"img-fluid\">
                                    </div>
                                    <div class=\"col-md-6\">
                                        <h5 class=\"pt-2\">$articulo</h5>
                                        <small class=\"text-secondary\">Vendedor: Collector's Isle</small>
                                        <h5 class=\"pt-2\">$precio</h5>
                                        <button type=\"submit\" class=\"btn btn-warning\">Guardar para después</button>
                                        <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remover\">Remover</button>
                                    </div>
                                    <div class=\"col-md-3 py-5\">
                                        <div>
                                            <button type=\"button\" class=\"btn bg-light border rounder-circle\"><i class=\"fas fa-minus\"></i></button>
                                            <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                            <button type=\"button\" class=\"btn bg-light border rounder-circle\"><i class=\"fas fa-plus\"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

        ";

        echo $elemento;
    }