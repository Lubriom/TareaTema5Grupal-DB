<?php

namespace app\Gestion;

use app\Producto\Electronico;
use app\Producto\Producto;
use app\Producto\Ropa;
use app\Producto\Comida;
use app\Gestion\Descuento;

use DateTime;

class Carrito
{

    private $productos = array();

    function __construct()
    {
        $this->productos = $_SESSION["productos"] ?? [];
    }

    /**
     * Agrega productos en un array
     */
    function agregarProducto(Producto $producto): void
    {
        $this->productos[] = $producto;
        $_SESSION["productos"] = $this->productos;
    }
    /**
     * Elimina un producto pasandole por parametro el id del mismo 
     */
    function eliminarProducto(int $id): void
    {
        foreach ($this->productos as $keys => $producto) {
            if ($id == $producto->getId()) {
                unset($this->productos[$keys]);
                break;
            }
        }

        $this->productos = array_values($this->productos);

        $_SESSION["productos"] = $this->productos;
    }

    //Se aplica el trait Descuento
    use Descuento;


    /**
     * Calcula el total de precios de los productos agregados al carrito
     */
    function calcularTotal(): float
    {
        $total = 0;

        foreach ($this->productos as $producto) {
            $total += $producto->calcularPrecioIva();
        }
        return $total;
    }

    /**
     * Vacia el carrito de productos
     */
    function vaciarCarrito(): void
    {
        $this->productos = array();
        $_SESSION["productos"] = $this->productos;
    }

    function mostrarCarrito(): void
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        if ($this->productos == null) {
            echo "<div class=\"producto\">
            <p>No hay ningun producto en el carrito</p>
            </div>";
        } else {

            foreach ($this->productos as $producto) {
                echo "<div class=\"producto\">
            <p>Nombre: " . $producto->getNombre() . "</p>";
                if ($producto instanceof Ropa) {
                    echo "<p>Talla: " . $producto->getTalla() . "</p>";
                } elseif ($producto instanceof Electronico) {
                    echo "<p>Modelo: " . $producto->getModelo() . "</p>";
                } elseif ($producto instanceof Comida) {

                    echo "<p>Caducidad: " . $producto->getCaducidad() . "</p>";
                }
                echo "<p>Precio con Iva: " . $producto->calcularPrecioIva() . "€</p>
                <form class=\"form_carrito\" action=\"carrito\" method=\"post\" enctype=\"multipart/form-data\"> 
                <input type=\"hidden\" name=\"csrf_token\" value=" . $_SESSION['csrf_token'] . ">
        <input type=\"hidden\" name=\"producto_eliminar\" value=" . $producto->getId() . ">
            <input type=\"submit\" name=\"eliminar\" class=\"button\" value=\"Eliminar\">
            </input></form>
        </div>";
            }
        }
    }

    function getCantidad(): int
    {
        if (empty($_SESSION["productos"])) {
            return 0;
        } else {
            return count($_SESSION["productos"]);
        }
    }
}
