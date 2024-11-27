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

    /**
     * Devuelve el valor del modelo del producto
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     *  Modifica el valor del modelo por el nuevo valor pasado por parametro
     */
    public function setModelo(string $nuevaModelo): void
    {
        $this->modelo = $nuevaModelo;
    }
}
