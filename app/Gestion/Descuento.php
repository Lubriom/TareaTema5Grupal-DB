<?php
namespace app\Gestion;

use app\Producto\Producto;
use Exception;

trait Descuento {
    /**
     * Aplica un descuento a un precio.
     *
     * @param float $precio Precio original.
     * @param float $descuento Porcentaje de descuento (0 a 100).
     * @return float Precio con el descuento aplicado.
     */
    public function aplicarDescuento($precio, $descuento) {
        if ($descuento < 0 || $descuento > 100) {
            throw new Exception("El porcentaje de descuento debe estar entre 0 y 100.");
        }
        return $precio - ($precio * ($descuento / 100));
    }
}