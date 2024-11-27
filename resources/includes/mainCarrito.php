<?php

use app\Gestion\Carrito;
use app\Producto\Producto;
use app\Producto\Ropa;

$carrito = new Carrito();

/**
 * Funcion que sirve para comprobar y filtrar los valores que se han recibido de un formulario
 */
function filtrado(String $datos): string
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>

<div class="main__carrito">
    <div class="productos">

        <?php
        // $ropa1 = new Ropa("camiseta", 12.14, "M");
        // $ropa2 = new Ropa("pantalon", 18.14, "XS");
        // $ropa3 = new Ropa("pantalon", 18.14, "XS");

        // $carrito->agregarProducto($ropa1);
        // $carrito->agregarProducto($ropa2);
        // $carrito->agregarProducto($ropa3);

        if (isset($_POST["eliminar"])) {
            $csrf_token = isset($_POST['csrf_token']) ? filtrado($_POST['csrf_token']) : '';
            if ($csrf_token !== $_SESSION['csrf_token']) {
                die('Token CSRF inválido');
            }

            $idProdEliminar = filtrado($_POST["producto_eliminar"]);

            $carrito->eliminarProducto($idProdEliminar);
        }

        if (isset($_POST["vaciar"])) {
            $carrito->vaciarCarrito();
            $carrito->mostrarCarrito();
        } else {
            $carrito->mostrarCarrito();
        }

        ?>

    </div>
    <div class="opciones">
        <div class="control">
            <p>Cantidad de productos: <?php echo $carrito->getCantidad() ?></p>
            <p>Precio Total: <?php echo $carrito->calcularTotal() ?></p>
        </div>
        <div class="botones">
            <form action="carrito" method="post" enctype="multipart/form-data">
                <input type="submit" name="vaciar" class="button" value="Vaciar Carrito"></input>
            </form>
        </div>
    </div>
</div>