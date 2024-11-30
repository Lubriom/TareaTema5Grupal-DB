<?php

namespace app\Producto;


use DateTime;

class Comida extends Producto
{
    
    private DateTime $caducidad;
    function __construct(string $nombre_producto, float $precio_producto, DateTime $caducidad)
    {
        parent::__construct($nombre_producto,$precio_producto);
        $this->$caducidad = $caducidad;
    }
    public function mostrarDescripcion(): string
    {
        return "Producto: {$this->getNombre()}, Caducidad: $this->caducidad, Precio : {$this->getPrecio()}";
    }

    /**
     * Devuelve el valor de la caducidad del producto
     */
    public function getCaducidad(): DateTime
    {
        return $this->caducidad;
    }

    /**
     *  Modifica el valor de la caducidad por el nuevo valor pasado por parametro
     */
    public function setCaducidad(string $nuevaCaducidad): void
    {
        $this->caducidad = $nuevaCaducidad;
    }
}
