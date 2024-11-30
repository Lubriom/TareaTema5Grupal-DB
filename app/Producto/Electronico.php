<?php

namespace app\Producto;


class Electronico extends Producto
{
    private string $modelo;
    private int $id_elect;
    private static int $contador = 0;
    function __construct(private string $nombre_producto, private string $precio_producto, string $modelo)
    {
        parent::__construct($nombre_producto, $precio_producto);
        self::$contador++;
        $this->id_elect = self::$contador;
        $this->modelo = $modelo;
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
