<?php

use App\Models\ProductoModel;

$conexion = new ProductoModel();

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$errores = [];

/**
 * Método para comprobar los datos de un campo
 */
function comprobarErrores(array $datos, string $tipoCampo): array
{
    $conexion = new ProductoModel();
    $usuario = $conexion->find($datos[$tipoCampo]);
    $errores = [];
    switch ($tipoCampo) {
        case 'id':
            if (empty($datos[$tipoCampo])) {
                $errores[$tipoCampo] = "Por favor rellene el campo";
            } else if (!preg_match("/^[\d]{1,}$/", $datos[$tipoCampo])) {
                $errores[$tipoCampo] = "Sólo se puede ingresar números.";
            } else if (empty($usuario)) {
                $errores[$tipoCampo] = "No existe un usuario con este ID";
            }
            break;
        case 'descuento':
            if (empty($datos[$tipoCampo])) {
                $errores[$tipoCampo] = "Por favor rellene el campo";
            } else if (!preg_match("/^[\d]{1,3}", $datos[$tipoCampo])) {
                $errores[$tipoCampo] = "El descuento no puede ser inferior a 0 ni superior a 100";
            }
            break;
    }
    return $errores;
}


//Se filran los datos del input
$hayErrores = false;
$datosUsuario = [];
if (isset($_POST['eliminar']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datosUsuario['id'] = functionfiltrado($_POST['id']);
    $datosUsuario['descuento'] = functionfiltrado($_POST['descuento']);

    foreach ($datosUsuario as $clave => $campo) {
        $erroresCampo = comprobarErroresDel($datosUsuario, $clave);
        $errores = array_merge($errores, $erroresCampo);
        if (!empty($errores[$clave])) {
            $hayErrores = true;
        }
    }
}

?>

<!-- Transacción y Procedimientos -->
<div class="home__productos">
    <h1 class="title">Transacción y Procedimientos</h1>

    <!-- Transacción -->
    <div class="seccion-tran">
        <h3 class="title">Ejemplo de Transacción</h3>
        <form method="post" action="/productos">
            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input class="button__alt" type="submit" id="transaccion" name="transaccion" value="Realizar transacción">
        </form>
    </div>

    <!-- Primer Procedimiento -->
    <div class="seccion-prod1">
        <h3 class="title">Ejemplo de Transacción</h3>
        <?php echo "Hay un total de: " . $conexion->contarProductos(); ?>
    </div>

    <!-- Segundo Procedimiento -->
    <div class="seccion-prod2">
        <p>Calcular descuento del producto</p>
        <form action="productos" method="post">
            <label for="id">Introducir ID</label>
            <input type="text" id="id" name="id">
            <label for="descuento">Introducir Descuento</label>
            <input type="text" id="descuento" name="descuento">
            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input class="button__alt" type="submit" id="precio_desc" name="precio_desc" value="Realizar descuento" />
        </form>

        <?php
        if (isset($_POST["precio_desc"])) {

            $precio = $conexion->select("precio")->where("id", $_POST["id"])->get();
            echo "Descuento final es: " . $conexion->calcular_precio_con_descuento($precio[0]["precio"], $_POST["descuento"]);
        }
        ?>
    </div>
</div>

<?php

if (isset($_POST['transaccion'])) { // Comprobamos si se hizo click en 'Realizar Transaccion'
    if ($_POST['token'] == $_SESSION['token']) {
        $conexion->aniadirProducto();

        header('Location: /productos');
    } else {
        echo 'Token Invalido';
    }
} else if (!$hayErrores) { // Comprobamos si se hizo click en 'Realizar Descuento'
    if (isset($_POST['eliminar']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['token'] == $_SESSION['token']) {
            $conexion->delete($datosUsuario['id']);

            header('Location: /usuarios');
        } else {
            echo 'Token Invalido';
        }
    }
}
exit();
?>