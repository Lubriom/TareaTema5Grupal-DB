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

    ob_start();

    $prodRopaModel = new ProductoModel();
    $prodElecModel = new ProductoModel();
    $prodComidaModel = new ProductoModel();
    $transaccionProducto = new ProductoModel();

    ?>
    <h1 class="title">Sección de Ropa</h1>

    <div class="seccion-ropa">
        <?php
        $productosRopa = $prodRopaModel
            ->select("producto.*", "ropa.talla")
            ->join("ropa as ropa", "producto.id", "ropa.id_prod")
            ->get();

        foreach ($productosRopa as $value) {
            $producto = new Ropa($value["nombre"], $value["precio"], $value["talla"]);
            $productosInstancias['ropa'][$value["id"]] = $producto;

            echo "
            <div class=\"card__producto\">
                <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
                <form class=\"form_carrito\" action=\"productos\" method=\"post\"> 
                    <input type=\"hidden\" name=\"producto_id\" value=\"" . $value["id"]. "\">
                    <input type=\"hidden\" name=\"producto_tipo\" value=\"ropa\">
                    <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
                </form>
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
            ->get();

        foreach ($productosComida as $value) {
            $caducidad = new DateTime($value["caducidad"]);
            $producto = new Comida($value["nombre"], $value["precio"], $caducidad);
            $productosInstancias['comida'][$value["id"]] = $producto;

            echo "
            <div class=\"card__producto\">
                <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
                <form class=\"form_carrito\" action=\"productos\" method=\"post\"> 
                    <input type=\"hidden\" name=\"producto_id\" value=\"" . $value["id"] . "\">
                    <input type=\"hidden\" name=\"producto_tipo\" value=\"comida\">
                    <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
                </form>
            </div>";
        }
        ?>
    </div>

    <h1 class="title">Sección de Electrónicos</h1>
    <div class="seccion-ropa">
        <?php
        $productosElectronico = $prodElecModel
            ->select("producto.*", "electronico.modelo")
            ->join("electronico as electronico", "producto.id", "electronico.id_prod")
            ->get();

       
        foreach ($productosElectronico as $value) {
            $producto = new Electronico($value["nombre"], $value["precio"], $value["modelo"]);
            $productosInstancias['electronico'][$value["id"]] = $producto;
            echo "
            <div class=\"card__producto\">
                <div class=\"card__title\">";
            echo $producto->mostrarDescripcion();
            echo "</div>
                <form class=\"form_carrito\" action=\"productos\" method=\"post\"> 
                    <input type=\"hidden\" name=\"producto_id\" value=\"" . $value["id"] . "\">
                    <input type=\"hidden\" name=\"producto_tipo\" value=\"electronico\">
                    <input type=\"submit\" name=\"agregar\" class=\"card__button\" value=\"Agregar al carrito\">
                </form>
            </div>";
        }
        ?>
    </div>


    <?php

    if (isset($_POST["agregar"])) {
        $carrito = new Carrito();

        $tipo = $_POST["producto_tipo"];
        $id = $_POST["producto_id"];

        if ($tipo === 'ropa' && isset($productosInstancias['ropa'][$id])) {
            $producto = $productosInstancias['ropa'][$id];
        } elseif ($tipo === 'comida' && isset($productosInstancias['comida'][$id])) {
            $producto = $productosInstancias['comida'][$id];
        } elseif ($tipo === 'electronico' && isset($productosInstancias['electronico'][$id])) {
            $producto = $productosInstancias['electronico'][$id];
        }

        if (isset($producto)) {
            $carrito->agregarProducto($producto);
        }

        header("Location: /productos");
    }
