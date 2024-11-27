<?php

use app\Producto\Producto;

trait descuento
{
    public function aplicarDescuento(string $nombre_producto, float $precio_producto, float $descuento)
    {
        parent::__construct($nombre_producto, $precio_producto);
        $descuento = $precio_producto % 10;
        return $descuento;
    }
}
