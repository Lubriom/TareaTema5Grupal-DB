<?php

namespace app\Producto;

abstract class Producto implements VendibleInterface
{
    private static int $contador = 0;
    private int $id_producto;
    private string $nombre_producto;
    private float $precio_producto;
    const IVA = 0.21;
    function __construct(string $nombre_producto, float $precio_producto)
    {
        self::$contador++; 
        $this->id_producto = self::$contador;
        $this->nombre_producto = $nombre_producto;
        $this->precio_producto = $precio_producto;
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
     *  Modifica el valor del id por el nuevo valor pasado por parametro
     */
    public function setId(string $nuevoId): void
    {
        $this->id_producto = $nuevoId;
    }

    /**
     * Devuelve el valor del nombre del producto
     */
    public function getNombre(): string
    {
        return $this->nombre_producto;
    }

    /**
     *  Modifica el valor del nombre por el nuevo valor pasado por parametro
     */
    public function setNombre(string $nuevoNombre): void
    {
        $this->nombre_producto = $nuevoNombre;
    }

    /**
     * Devuelve el valor del precio del producto
     */
    public function getPrecio(): float
    {
        return $this->precio_producto;
    }

    /**
     *  Modifica el valor del precio por el nuevo valor pasado por parametro
     */
    public function setPrecio(float $nuevoPrecio): void
    {
        $this->precio_producto = $nuevoPrecio;
    }
}
