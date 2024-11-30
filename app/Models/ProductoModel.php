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

    function aniadirProducto() 
    {
        
        try {
            $conex = $this->getConnection(); // Obtiene la conexión
            $conex->beginTransaction();
            
            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Calcetin', 9.99);");
            $conex->query("INSERT INTO ropa(talla, id_prod) VALUES ('XXL',".$conex->lastInsertId().");");
            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Fresa', 12.50);");
            $conex->query("INSERT INTO comida(caducidad, id_prod) VALUES ('2024-12-19',".$conex->lastInsertId().");");
            $conex->query("INSERT INTO producto(nombre, precio) VALUES ('Pen', 9.99);");
            $conex->query("INSERT INTO electronico(modelo, id_prod) VALUES ('toshiba',".$conex->lastInsertId().");");
            $conex->commit(); // Confirma la transacción
        } catch (Exception $e) {
            $conex->rollBack(); // Revierte los cambios en caso de error
            echo "Ha habido algún error!!: " . $e->getMessage();
        }
    }
}
