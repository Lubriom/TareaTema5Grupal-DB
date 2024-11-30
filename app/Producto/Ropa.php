<?php

namespace app\Producto;


class Ropa extends Producto 
{
    private string $talla;

    function __construct(private string $nombre_producto,private float $precio_procucto, string $talla)
    {
        parent::__construct($nombre_producto, $precio_procucto);
        $this->talla = $talla;
    }
    public function mostrarDescripcion(): string
    {
        return "<h1>{$this->getNombre()}</h1> <p>Talla: $this->talla</p> <p>Precio : {$this->getPrecio()} €</p>";
    }

    /**
     * Devuelve el valor del talla del producto
     */
    public function getTalla(): string
    {
        return $this->talla;
    }

    /**
     *  Modifica el valor del talla por el nuevo valor pasado por parametro
     */
    public function setTalla(string $nuevaTalla): void
    {
        $this->talla = $nuevaTalla;
    }

}
