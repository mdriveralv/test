<?php

use App\DTO\UserDTO;
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
        $datosUsuario = new UserDTO();

        $datosUsuario->nombre = 'Daniel Rivera';
        $datosUsuario->correoElectronico = 'micorreo@correo.com';
        $datosUsuario->contrasena = '123456';
        $datosUsuario->documentoIdentidad = 'ID-12345';

        $useCase->execute($datosUsuario);
        $this->assertCount(1, $repositorio->buscarUsuarioPorIdentificacion($datosUsuario->documentoIdentidad));
    }

    public function testUsuarioNoEsGuardadoCuandoYaExisteDocumentoIdentidad(): void
    {
        $repositorio = new UserRepository();
        $useCase = new SaveUserUseCase($repositorio);

        $datosUsuario = new UserDTO();

        $datosUsuario->nombre = 'Daniel Rivera';
        $datosUsuario->correoElectronico = 'micorreo@correo.com';
        $datosUsuario->contrasena = '123456';
        $datosUsuario->documentoIdentidad = 'ID-12345';

        $useCase->execute($datosUsuario);

        $datosUsuario = new UserDTO();
        $datosUsuario->nombre = 'Marvin Alvarenga';
        $datosUsuario->correoElectronico = 'otrocorreo@correo.com';
        $datosUsuario->contrasena = 'ABCDE';
        $datosUsuario->documentoIdentidad = 'ID-12345';

        $this->expectException(UsuarioConNumeroIdentificacionYaExiste::class);
        $useCase->execute($datosUsuario);
    }
}
