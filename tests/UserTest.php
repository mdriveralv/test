<?php

namespace App\Tests;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $usuario;

    protected function setUp(): void
    {
        $this->usuario = new User('Daniel Rivera', 'correoelectronico@correo.com', '12345', 'ID12345');
    }

    // Test Obtener Nombre
    public function testGetNombre()
    {
        $this->assertEquals('Daniel Rivera', $this->usuario->getNombre());
    }

    // Test Modificar Nombre
    public function testSetNombre()
    {
        $this->usuario->setNombre('Marvin Daniel Rivera');
        $this->assertEquals('Marvin Daniel Rivera', $this->usuario->getNombre());
    }

    // Test Obtener Correo Electrónico
    public function testGetCorreoElectronico()
    {
        $this->assertEquals('correoelectronico@correo.com', $this->usuario->getCorreoElectronico());
    }

    // Test Modificar CorreoElectronico
    public function testSetCorreoElectronico()
    {
        $this->usuario->setCorreoElectronico('micorreo@correo.com');
        $this->assertEquals('micorreo@correo.com', $this->usuario->getCorreoElectronico());
    }

    // Test Obtener Contraseña
    public function testGetContrasena()
    {
        $this->assertEquals('12345', $this->usuario->getContrasena());
    }

    // Test Modificar Contraseña
    public function testSetContrasena()
    {
        $this->usuario->setContrasena('12EA5');
        $this->assertEquals('12EA5', $this->usuario->getContrasena());
    }

    // Test Obtener DocumentoIdentificacion
    public function testGetDocumentoIdentificacion()
    {
        $this->assertEquals('ID12345', $this->usuario->getDocumentoIdentidad());
    }

    // Test Modificar DocumentoIdentificacion
    public function testSetDocumentoIdentificacion()
    {
        $this->usuario->setDocumentoIdentidad('ID-12345');
        $this->assertEquals('ID-12345', $this->usuario->getDocumentoIdentidad());
    }
}
