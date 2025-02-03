<?php

use App\Controller\UserController;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreacionUsuarioDesdeControlador(): void
    {

        $controlador = new UserController();

        $datosUsuario = array(
            'nombre' => 'Daniel Rivera',
            'correoElectronico' => 'micorreo@correo.com',
            'contrasena' => '123456',
            'documentoIdentidad' => 'ID-12345'
        );

        $this->assertEquals(200, $controlador->guardarUsuario($datosUsuario));
    }
}
