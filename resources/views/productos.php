<!DOCTYPE html>
<html lang="es">

<head>
    <?php require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "componentes" . DIRECTORY_SEPARATOR . 'head.php'; ?>
    <title>Inicio | Tarea_Tema5Grupal</title>
</head>

<body>
    <?php require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "componentes" . DIRECTORY_SEPARATOR . 'header.php'; ?>
    <div class="content">
        <main class="main">
            <?php require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "componentes" . DIRECTORY_SEPARATOR . 'main.php'; ?>
        </main>
    </div>
    <?php require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "componentes" . DIRECTORY_SEPARATOR . 'footer.php'; ?>
    <?php
    // use App\Models\UsuarioModel; // - Recuerda el uso del autoload.php

    // Se instancia el modelo
    //  $usuarioModel = new UsuarioModel();

    // Descomentar consultas para ver la creación. Cuando se lanza execute hay código para
    // mostrar la consulta SQL que se está ejecutando.

    // Consulta 
    //$usuarioModel->all();

    // Consulta
    //$usuarioModel->select('columna1', 'columna2')->get();

    // Consulta
    //  $usuarioModel->select('columna1', 'columna2')
    //              ->where('columna1', '>', '3')
    //              ->orderBy('columna1', 'DESC')
    //              ->get();

    // Consulta
    // $usuarioModel->select('columna1', 'columna2')
    //             ->where('columna1', '>', '3')
    //             ->where('columna2', 'columna3')
    //             ->where('columna2', 'columna3')
    //             ->where('columna3', '!=', 'columna4', 'OR')
    //             ->orderBy('columna1', 'DESC')
    //             ->get();

    // Consulta
    //$usuarioModel->create(['id' => 1, 'nombre' => 'nombre1']);

    // Consulta
    //$usuarioModel->delete(['id' => 1]);

    // Consulta
    //$usuarioModel->update(['id' => 1], ['nombre' => 'NombreCambiado']);
    ?>
</body>

</html>