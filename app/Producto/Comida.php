<?php

namespace app\Producto;


use DateTime;

class Comida extends Producto
{
    private DateTime $caducidad;
    function __construct(string $nombre_producto, float $precio_producto, string $caducidad_comida)
    {
        parent::__construct($nombre_producto,$precio_producto);
        $this->$caducidad_comida = $caducidad_comida;
    }
    public function mostrarDescripcion(): string
    {
        return "Producto: {$this->getNombre()}, Caducidad: $this->caducidad, Precio : {$this->getPrecio()}";
    }
}
