<?php

namespace App\Controller;

use App\DTO\UserDTO;
use App\Repository\UserRepository;
use App\UseCase\SaveUserUseCase;


class UserController
{
    public function guardarUsuario(array $data)
    {
        $repositorio = new UserRepository();

        $datosUsuario = new UserDTO();
        $datosUsuario->nombre = $data['nombre'];
        $datosUsuario->correoElectronico = $data['correoElectronico'];
        $datosUsuario->contrasena = $data['contrasena'];
        $datosUsuario->documentoIdentidad = $data['documentoIdentidad'];

        (new SaveUserUseCase($repositorio))->execute($datosUsuario);
        return 200;
    }
}
