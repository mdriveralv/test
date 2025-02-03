<?php

namespace App\UseCase;

use App\DTO\UserDTO;
use App\Repository\UserRepositoryInterface;
use App\Exceptions\UsuarioConNumeroIdentificacionYaExiste;
use App\User;

class SaveUserUseCase
{
    private UserRepositoryInterface $repositorio;

    public function __construct($repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function execute(UserDTO $datosUsuario): void
    {
        // Validación por documentoIdentidad
        if ($this->repositorio->buscarUsuarioPorIdentificacion($datosUsuario->documentoIdentidad)) {
            throw new UsuarioConNumeroIdentificacionYaExiste();
        }

        $this->repositorio->guardar($datosUsuario);
    }
}
