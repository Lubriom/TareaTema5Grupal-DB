<?php

namespace App\Models;

use app\Models\Model;
use Exception;

class ProductoModel extends Model
{

    // Nombre de la tabla que se realizarán las consultas
    protected $table = 'producto';

    // Aquí también se podría definir las consultas que son específicas
    // para los usuarios. Para las demás llamaremos a los métodos de la
    // clase padre.
    // También se podría configurar la conexión para que la información se 
    // recuperase de otra base de datos, otro usuario, etc. cambiando:
    // protected $db_host = 'localhost';
    // protected $db_user = 'root';
    // protected $db_pass = '';
    // protected $db_name = 'mvc_database'; 

    function aniadirProducto(): void
    {

        try {
            $conex = $this->getConnection();
            $conex->beginTransaction();

            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Calcetin', 9.99);");
            $conex->query("INSERT INTO ropa(talla, id_prod) VALUES ('XXL'," . $conex->lastInsertId() . ");");
            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Fresa', 12.50);");
            $conex->query("INSERT INTO comida(caducidad, id_prod) VALUES ('2024-12-19'," . $conex->lastInsertId() . ");");
            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Pen', 9.99);");
            $conex->query("INSERT INTO electronico(modelo, id_prod) VALUES ('toshiba'," . $conex->lastInsertId() . ");");

            $conex->commit();
        } catch (Exception $e) {
            $conex->rollBack();
            echo "Ha habido algún error!!: " . $e->getMessage();
        }
    }

    function contarProductos(): Int
    {
        try {
            $conex = $this->getConnection();

            $resultado = $conex->prepare('CALL contar_productos (@totalProductos)');
            $resultado->execute();

            $resultado->closeCursor();
            $resultado = $conex->query("SELECT @totalProductos AS total");
            $totalProductos = $resultado->fetchColumn();

            return $totalProductos;
        } catch (Exception $e) {
            die("Error al contar los productos: " . $e->getMessage());
        }
    }
    function calcular_precio_con_descuento(float $precio, float $descuento): string|float
    {
        try {
            $conex = $this->getConnection();


            // Llamada al procedimiento
            $sql = 'CALL calcular_precio_con_descuento(:precio, :descuento, @precioFinal)';
            $result = $conex->prepare($sql);
            $result->bindParam(':precio', $precio);
            $result->bindParam(':descuento', $descuento);
            $result->execute();

            $result->closeCursor();

            $result = $conex->query('SELECT @precioFinal AS precioFinal');
            $precioFinal = $result->fetchColumn();

            if ($precioFinal === null) {
                return "El descuento proporcionado no es válido.";
            } else {

                return $precioFinal;
            }
        } catch (Exception $e) {
            die("Error al calcular el precio con descuento: " . $e->getMessage());
        }
    }
}
