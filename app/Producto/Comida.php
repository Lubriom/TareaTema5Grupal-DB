<?php

namespace app\Producto;

use DateTime;

class Comida extends Producto
{

    // Constructor
    function __construct(private int $id_producto, private string $nombre_producto, private float $precio_producto, private DateTime $caducidad, private int $id_comida)
    {
        parent::__construct($id_producto,$nombre_producto, $precio_producto);
     
    }

    // Método para mostrar la descripción
    public function mostrarDescripcion(): string
    {
        // Aquí se usa el método format() para mostrar la fecha correctamente
        return "<h1>{$this->getNombre()}</h1> <p>Caducidad: {$this->caducidad->format('Y-m-d H:i:s')}</p> <p>Precio sin Iva: {$this->getPrecio()} €</p>";
    }

    /**
     * Devuelve el valor de la caducidad del producto
     */
    public function getCaducidad(): string
    {
        return $this->caducidad->format('Y-m-d H:i:s');
    }

    /**
     * Devuelve el valor del id de la ropa
     */
    public function getId_Comida(): int
    {
        return $this->id_comida;
    }

    /**
     * Modifica el valor de la caducidad por el nuevo valor pasado por parámetro
     */
    public function setCaducidad(DateTime $nuevaCaducidad): void
    {
        $this->caducidad = $nuevaCaducidad;
    }
}
