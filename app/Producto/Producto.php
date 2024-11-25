<?php

namespace app\Producto;

abstract class Producto implements VendibleInteface
{
    private string $id_producto;
    private string $nombre_producto;
    private float $precio_producto;
    const IVA = 0.21;
    function __construct(string $nombre_producto, float $precio_producto)
    {
        $this->nombre_producto = $nombre_producto;
        $this->precio_producto = $precio_producto;
    }
    abstract public function mostrarDescripcion(): void;

    public function calcularPrecioIva(): float
    {
        $precio_Iva = $this->precio_producto + ($this->precio_producto * Producto::IVA);
        return $precio_Iva;
    }
}
