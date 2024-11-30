<?php

namespace app\Producto;
use app\Gestion\Descuento;

abstract class Producto implements VendibleInterface
{
  
    const IVA = 0.21;
    function __construct(private int $id_producto, private string $nombre_producto,private float $precio_producto)
    {
   
    }
    abstract public function mostrarDescripcion(): string;


    public function calcularPrecioIva(): float
    {
        return $this->precio_producto + ($this->precio_producto * Producto::IVA);
    }

    /**
     * Devuelve el valor del id del producto
     */
    public function getId(): string
    {
        return $this->id_producto;
    }

    /**
     * Devuelve el valor del nombre del producto
     */
    public function getNombre(): string
    {
        return $this->nombre_producto;
    }

    /**
     * Devuelve el valor del precio del producto
     */
    public function getPrecio(): float
    {
        return $this->precio_producto;
    }

}
