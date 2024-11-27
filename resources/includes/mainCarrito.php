<?php use app\Gestion\Carrito;
use app\Producto\Producto;
use app\Producto\Ropa;

?>

<div class="main__carrito">
    <div class="productos">

    <?php 
    $carrito =new Carrito();

    $ropa1=new Ropa("camiseta",12.14,"M");
    $ropa2=new Ropa("pantalon",18.14,"XS");

    $carrito->agregarProducto($ropa1);
    $carrito->agregarProducto($ropa2);

    $carrito->mostrarCarrito();
     ?>

    </div>
    <div class="opciones">
        <div class="control">
            <p>Cantidad de productos: 1</p>
            <p>Precio Total: <?php $carrito->calcularTotal()?></p>
        </div>
        <div class="botones">
            <input type="button" class="button" value="Vaciar Carrito"></input>
        </div>
    </div>
</div>