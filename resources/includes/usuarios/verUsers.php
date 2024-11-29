<?php
    // Aquí importaremos el modelo usuarios
    use App\Models\UsuarioModel;

    $conexion = new UsuarioModel();
    $usuarios =$conexion->all();
    // $usuario = $conexion->find(2);
    // echo $usuario;
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
    </tr>

    <?php
    
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario['id'] . "</td>";
            echo "<td>" . $usuario['nombre'] . "</td>";
            echo "<td>" . $usuario['apellido'] . "</td>";
            echo "<td>" . $usuario['edad'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>