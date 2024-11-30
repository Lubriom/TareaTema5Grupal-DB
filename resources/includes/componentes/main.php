<div class="home__productos">
    <?php

    use app\Gestion\Carrito;
    use App\Models\ProductoModel;
    use App\Models\RopaModel;
    use App\Models\ElectronicoModel;
    use App\Models\ComidaModel;
    use App\Models\Model;
    use app\Producto\Comida;
    use app\Producto\Electronico;
    use App\Producto\Producto;
    use app\Producto\Ropa;

    $prodRopaModel = new ProductoModel();
    $prodElecModel = new ProductoModel();
    $prodComidaModel = new ProductoModel();
    $transaccionProducto = new ProductoModel();

    ?>
    <h1 class="title">Sección de Ropa</h1>

    <div class="seccion-ropa">
        <?php
        //"SELECT producto.*, ropa.talla FROM producto as producto INNER JOIN  ropa as ropa_prod ON producto.id = ropa_prod.id"
        //SELECT producto.*,ropa.talla FROM `producto` as producto INNER join ropa as ropa on producto.id=ropa.id;
        $productosRopa = $prodRopaModel
            ->select("producto.*", "ropa.talla")
            ->join("ropa as ropa", "producto.id", "ropa.id_prod")
            ->get(); // Ejecutamos la consulta

        foreach ($productosRopa as $value) {
            $producto = new Ropa($value["nombre"], $value["precio"], $value["talla"]);
            $productosInstancias['ropa'][$value["id"]] = $producto;


            echo "
            <div class=\"card__producto\">
            <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
             <form class=\"form_carrito\" action=\"productos\" method=\"post\" enctype=\"multipart/form-data\"> 
            <input type=\"hidden\" name=\"producto_agregar\" value=" . $producto->getId() . ">
            <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
            </input></form>
                </div>";
        }

        ?>
    </div>
    <h1 class="title">Sección de Comida</h1>

    <div class="seccion-ropa">
        <?php

        $productosComida = $prodComidaModel
            ->select("producto.*", "comida.caducidad")
            ->join("comida as comida", "producto.id", "comida.id_prod")
            ->get(); // Ejecutamos la consulta

        foreach ($productosComida as $value) {
            $caducidad = new DateTime($value["caducidad"]);
            $producto = new Comida($value["nombre"], $value["precio"], $caducidad);
            $productosInstancias['comida'][$value["id"]] = $producto;


            echo "
            <div class=\"card__producto\">
            <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
            <form class=\"form_carrito\" action=\"productos\" method=\"post\" enctype=\"multipart/form-data\"> 
        <input type=\"hidden\" name=\"producto_agregar\" value=" . $producto->getId() . ">
        <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
        </input></form>
            </div>";
        }
        ?>

    </div>

    <h1 class="title">Sección de Electronico</h1>

    <div class="seccion-ropa">
        <?php
        //SELECT producto.*, electronico.modelo FROM producto INNER JOIN electronico AS electronico ON producto.id = electronico.id_prod;
        $productosElectronico = $prodElecModel
            ->select("producto.*", "electronico.modelo")
            ->join("electronico as electronico", "producto.id", "electronico.id_prod")
            ->get(); // Ejecutamos la consulta

        foreach ($productosElectronico as $value) {
            $producto = new Electronico($value["nombre"], $value["precio"], $value["modelo"]);
            $productosInstancias['electronico'][$value["id"]] = $producto;

            echo "
                <div class=\"card__producto\">
                <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
                <form class=\"form_carrito\" action=\"productos\" method=\"post\" enctype=\"multipart/form-data\"> 
            <input type=\"hidden\" name=\"producto_agregar\" value=" . $producto->getId() . ">
            <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
            </input></form>
                </div>";
        }
        ?>
    </div>

</div>

<?php

if (isset($_POST["agregar"])) {
    $carrito = new Carrito();

    foreach ($productosRopa as $value) {
        if ($value["id"] == $_POST["producto_agregar"]) {
            $producto = $productosInstancias['ropa'][$value["id"]];
        }
    }

    foreach ($productosComida as $value) {
        if ($value["id"] == $_POST["producto_agregar"]) {
            $caducidad = new DateTime($value["caducidad"]);
            $producto = $productosInstancias['comida'][$value["id"]];
        }
    }

    foreach ($productosElectronico as $value) {
        if ($value["id"] == $_POST["producto_agregar"]) {
            $producto = $productosInstancias['electronico'][$value["id"]];
        }
    }

    if (isset($producto)) {
        $carrito->agregarProducto($producto);
    }
    header("Location: /productos");
}
