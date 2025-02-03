<?php

namespace App;

class User
{
    private $nombre;
    private $correoElectronico;
    private $contrasena;
    private $fechaNacimiento;
    private $documentoIdentidad;

    public function __construct(string $nombre, string $correoElectronico, string $contrasena, string $documentoIdentidad)
    {
        $this->nombre = $nombre;
        $this->correoElectronico = $correoElectronico;
        $this->contrasena = $contrasena;
        $this->documentoIdentidad = $documentoIdentidad;
    }

    // Método Get - Atributo Nombre
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getCorreoElectronico(): string
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico(string $correoElectronico): void
    {
        $this->correoElectronico = $correoElectronico;
    }

    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    public function getDocumentoIdentidad(): string
    {
        return $this->documentoIdentidad;
    }

    public function setDocumentoIdentidad(string $documentoIdentidad): void
    {
        $this->documentoIdentidad = $documentoIdentidad;
    }
}
