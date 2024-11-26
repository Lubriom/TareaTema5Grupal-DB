<?php

namespace app\Producto;


class Electronico extends Producto
{  
    private string $modelo;     
    function __construct(string $nombre_electrónico, float $precio_electronico, string $modelo)
    {
        $this->$nombre_electrónico = $nombre_electrónico;
        $this->$precio_electronico = $precio_electronico;
        $this->$modelo=$modelo;
    }
    public function mostrarDescripcion(): void {}
}
