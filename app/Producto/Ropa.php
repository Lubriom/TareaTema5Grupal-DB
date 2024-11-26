<?php

namespace app\Producto;

class Ropa extends Producto
{
    private string $talla;

    function __construct(string $nombre_ropa, float $precio_ropa, string $talla)
    {
        $this->$nombre_ropa = $nombre_ropa;
        $this->$precio_ropa = $precio_ropa;
        $this->talla = $talla;
    }
    public function mostrarDescripcion(): void {}
}
