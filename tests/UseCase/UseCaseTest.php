<?php

use PHPUnit\Framework\TestCase;
use App\Repository\UserRepository;
use App\UseCase\SaveUserUseCase;
use App\Exceptions\UsuarioConNumeroIdentificacionYaExiste;

class SaveUserUseCaseTest extends TestCase
{
    public function testUsuarioEsGuardadoCuandoNoExiste(): void
    {
        $repositorio = new UserRepository();
        $useCase = new SaveUserUseCase($repositorio);

        $datosUsuario = array(
            'nombre' => 'Daniel Rivera',
            'correoElectronico' => 'micorreo@correo.com',
            'contrasena' => '123456',
            'documentoIdentidad' => 'ID-12345'
        );

        $useCase->execute($datosUsuario);
        $this->assertCount(1, $repositorio->buscarUsuarioPorIdentificacion($datosUsuario['documentoIdentidad']));
    }

    public function testUsuarioNoEsGuardadoCuandoYaExisteDocumentoIdentidad(): void
    {
        $repositorio = new UserRepository();
        $useCase = new SaveUserUseCase($repositorio);

        $datosUsuario = array(
            array(
                'nombre' => 'Daniel Rivera',
                'correoElectronico' => 'micorreo@correo.com',
                'contrasena' => '123456',
                'documentoIdentidad' => 'ID-12345'
            ),
            array(
                'nombre' => 'Marvin Alvarenga',
                'correoElectronico' => 'otrocorreo@correo.com',
                'contrasena' => '123456',
                'documentoIdentidad' => 'ID-12345'
            )
        );

        $this->expectException(UsuarioConNumeroIdentificacionYaExiste::class);

        foreach ($datosUsuario as $usr) {
            $useCase->execute($usr);
        }
    }
}
