<?php

namespace app\Producto;

use DateTime;

class Comida extends Producto
{
    private DateTime $caducidad;

    // Constructor
    function __construct(private string $nombre_producto, private float $precio_producto, DateTime $caducidad)
    {
        parent::__construct($nombre_producto, $precio_producto);
        $this->caducidad = $caducidad; // Aquí se corrigió el error de asignación
    }

    // Método para mostrar la descripción
    public function mostrarDescripcion(): string
    {
        // Aquí se usa el método format() para mostrar la fecha correctamente
        return "<h1>{$this->getNombre()}</h1> <p>Caducidad: {$this->caducidad->format('Y-m-d H:i:s')}</p> <p>Precio : {$this->getPrecio()} €</p>";
       
    }

    /**
     * Devuelve el valor de la caducidad del producto
     */
    public function getCaducidad(): string
    {
        return $this->caducidad->format('Y-m-d H:i:s');
    }

    /**
     * Modifica el valor de la caducidad por el nuevo valor pasado por parámetro
     */
    public function setCaducidad(DateTime $nuevaCaducidad): void
    {
        $this->caducidad = $nuevaCaducidad;
    }
}
