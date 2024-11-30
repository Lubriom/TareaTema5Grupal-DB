<?php

namespace app\Producto;


class Ropa extends Producto 
{

    function __construct(private int $id_producto, private string $nombre_producto,private float $precio_procucto,private string $talla, private int $id_ropa)
    {
        parent::__construct($id_producto, $nombre_producto, $precio_procucto);
    
    }
    public function mostrarDescripcion(): string
    {
        return "<h1>{$this->getNombre()}</h1> <p>Talla: $this->talla</p> <p>Precio sin Iva: {$this->getPrecio()} €</p>";
    }


    /**
     * Devuelve el valor del talla del producto
     */
    public function getTalla(): string
    {
        return $this->talla;
    }

    /**
     * Devuelve el valor del id de la ropa
     */
    public function getId_Ropa(): int
    {
        return $this->id_ropa;
    }

    /**
     *  Modifica el valor del talla por el nuevo valor pasado por parametro
     */
    public function setTalla(string $nuevaTalla): void
    {
        $this->talla = $nuevaTalla;
    }

}
