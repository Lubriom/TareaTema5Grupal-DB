<?php

namespace app\Producto;

class Ropa extends Producto
{
    private string $talla;

    function __construct(string $nombre_producto, float $precio_procucto, string $talla)
    {
        parent::__construct($nombre_producto, $precio_procucto);
        $this->talla = $talla;
    }
    public function mostrarDescripcion(): string
    {
        return "Producto: {$this->getNombre()}, Modelo: $this->talla, Precio : {$this->getPrecio()}";
    }
}
