<?php

namespace App\Gestion;

class Usuario
{
    public function __construct(private Int $id, private String $nombre, private String $apellido, private Int $edad)
    {
    }

    /**
     * 
     */
    public function getId(): Int
    {
        return $this->id;
    }

    /**
     * Método que devuelve el nombre de un usuario
     */
    public function getNombre(): String
    {
        return $this->nombre;
    }

    /**
     * Método que devuelve el apellido de un usuario
     */
    public function getApellido(): String
    {
        return $this->apellido;
    }

    /**
     * Método que devuelve la edad de un usuario
     */
    public function getEdad(): Int
    {
        return $this->edad;
    }
}
