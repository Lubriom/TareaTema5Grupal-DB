<?php
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$errores = [];

/**
 * Método para comprobar los datos de un campo
 */
function comprobarErroresDel(array $datos, string $tipoCampo): array
{
    $errores = [];
    switch ($tipoCampo) {
        case 'id':
            if (empty($datos[$tipoCampo])) {
                $errores[$tipoCampo] = "Por favor rellene el campo";
            } else if (!preg_match("/^[\d]{1,}$/", $datos[$tipoCampo])) {
                $errores[$tipoCampo] = "Sólo se puede ingresar números.";
            }   // IMPORTANTE -> Aquí se comprueba si el id existe en la base de datos - hace falta añadir
            
            break;
    }
    return $errores;
}


//Se filran los datos del input
$datosUsuario = [];
if (isset($_POST['register']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datosUsuario['id'] = functionfiltrado($_POST['id']);
}

$hayErrores = true;
foreach ($datosUsuario as $clave => $campo) {
    $erroresCampo = comprobarErroresMod($datosUsuario, $clave);
    $errores = array_merge($errores, $erroresCampo);
    if (!empty($errores[$clave])) {
        $hayErrores = false;
    }
}

?>

<div class="form__column">
    <div class="form__dato">
        <label>ID</label>
        <input type="text" id="id" name="id">
    </div>
    <?php if (isset($errores['id'])): ?>
        <p class="error"><?php echo $errores['id']; ?></p>
    <?php elseif (!isset($errores['id'])) : ?>
        <span></span>
    <?php endif; ?>
</div>
<input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>">
<input class="button__alt" type="submit" id="modificar" name="modificar" value="Eliminar Usuario">

<?php

//Se comprueba que hay errores y se procede a eliminar el usuario en la base de datos.
if ($hayErrores) {
    if (isset($_POST['register']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['token'] == $_SESSION['token']) {
            //Se muestran los datos sanitizados --> Importante: Sustituir esto por un delete en la base de datos
            echo 'Token Correcto<br>';
            foreach ($datosUsuario as $clave => $campo) {
                echo $clave . ": " . $campo . "<br>";
            }
        } else {
            echo 'Token Invalido';
        }
    }
}
?>