<?php

use App\Models\ProductoModel;

$conexion = new ProductoModel();

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$errores = [];
?>

<div class="home__productos">
    <h1 class="title">Transacción y Procedimientos</h1>

    <div class="seccion-tran">
        <h3 class="title">Ejemplo de Transacción</h3>
        <form method="post" action="/productos">
            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input class="button__alt" type="submit" id="transaccion" name="transaccion" value="Realizar transacción">
        </form>
    </div>

</div>

<?php
if (isset($_POST['transaccion'])) {
    if ($_POST['token'] == $_SESSION['token']) {
        $conexion->aniadirProducto();

        header('Location: /productos');
    } else {
        echo 'Token Invalido';
    }
}
?>
<div class="home__productos">
    <?php echo "Hay un total de: " . $conexion->contarProductos(); ?>
</div>