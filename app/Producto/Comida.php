<?php

namespace app\Producto;

use DateTime;

class Comida extends Producto
{
    private DateTime $caducidad;
    function __construct(string $nombre_comida, float $precio_comida, string $caducidad_comida)
    {
        $this->$nombre_comida = $nombre_comida;
        $this->$precio_comida = $precio_comida;
        $this->$caducidad_comida = $caducidad_comida;
    }
    public function mostrarDescripcion(): void {}
}
