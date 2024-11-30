<?php

namespace app\Producto;


class Electronico extends Producto
{

    function __construct(private int $id_producto, private string $nombre_producto, private string $precio_producto, private string $modelo, private int $id_elect)
    {
        parent::__construct($id_producto,$nombre_producto, $precio_producto);
    }
    public function mostrarDescripcion(): string
    {
        return "<h1>{$this->getNombre()}</h1> <p>Modelo: $this->modelo</p> <p>Precio sin Iva: {$this->getPrecio()} €</p>";
    }

    /**
     * Devuelve el valor del modelo del producto
     */
    public function getModelo(): string
    {
        return $this->modelo;
    }

    /**
     * Devuelve el valor del id de la ropa
     */
    public function getId_Elect(): int
    {
        return $this->id_elect;
    }

    /**
     *  Modifica el valor del modelo por el nuevo valor pasado por parametro
     */
    public function setModelo(string $nuevaModelo): void
    {
        $this->modelo = $nuevaModelo;
    }
}
