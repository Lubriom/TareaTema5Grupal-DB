<?php

namespace app\Producto;


class Electronico extends Producto 
{
    private string $modelo;
    function __construct(private string $nombre_producto,private string $precio_producto,string $modelo)
    {
        parent::__construct($nombre_producto, $precio_producto);
        $this->modelo = $modelo;
    }
    public function mostrarDescripcion(): string
    {
        return "<h1>{$this->getNombre()}</h1> <p>Modelo: $this->modelo</p> <p>Precio : {$this->getPrecio()} €</p>";

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
