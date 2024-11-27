<?php

namespace app\Gestion;

use app\Producto\Electronico;
use app\Producto\Producto;
use app\Producto\Ropa;
use app\Producto\Comida;

class Carrito
{

    private $productos = array();

    /**
     * Agrega productos en un array
     */
    function agregarProducto(Producto $producto): void
    {
        $this->productos[] = $producto;
    }
    /**
     * Elimina un producto pasandole por parametro el id del mismo 
     */
    function eliminarProducto(String $id): void
    {
        foreach ($this->productos as $producto) {
            if ($id == $producto->getId()) {
                unset($this->productos[$producto[$id]]);
            }
        }
    }

    /**
     * Calcula el total de precios de los productos agregados al carrito
     */
    function calcularTotal(): float
    {
        $total = 0;

        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }

    /**
     * Vacia el carrito de productos
     */
    function vaciarCarrito(): void
    {
        $this->productos = array();
    }

    function mostrarCarrito(): void
    {

        foreach ($this->productos as $producto) {
            echo "<div class=\"producto\">
            <p>Nombre: " . $producto->getNombre() . "</p>";
            if ($producto instanceof Ropa) {
                echo "<p>Talla:" . $producto->getTalla() . "</p>";
            } elseif ($producto instanceof Electronico) {
                echo "<p>Modelo:" . $producto->getModelo() . "</p>";
            } elseif ($producto instanceof Comida) {
                echo "<p>Caducidad:" . $producto->getCaducidad() . "</p>";
            }
            echo "<p>Precio: " . $producto->getPrecio() . "€</p>
            <input type=\"button\" class=\"button\" value=\"Eliminar\">
            </input>
        </div>";
        }
    }
}
