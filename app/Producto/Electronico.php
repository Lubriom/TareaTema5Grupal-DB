<?php

namespace app\Producto;


class Electronico extends Producto
{
    private string $modelo;
    function __construct(string $nombre_producto, $precio_producto,string $modelo)
    {
        parent::__construct($nombre_producto, $precio_producto);
        $this->modelo = $modelo;
    }
    public function mostrarDescripcion(): string
    {
        return "Producto: {$this->getNombre()}, Modelo: $this->modelo, Precio : {$this->getPrecio()}";
    }
}
