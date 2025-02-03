<?php

namespace App\UseCase;

use App\Repository\UserRepositoryInterface;
use App\Exceptions\UsuarioConNumeroIdentificacionYaExiste;
use App\User;

class SaveUserUseCase
{
    private UserRepositoryInterface $repositorio;
    private User $usuario;

    public function __construct($repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function execute(array $datosUsuario): void
    {
        $this->usuario = new User(
            $datosUsuario['nombre'],
            $datosUsuario['correoElectronico'],
            $datosUsuario['contrasena'],
            $datosUsuario['documentoIdentidad']
        );

        // Validación por documentoIdentidad
        if ($this->repositorio->buscarUsuarioPorIdentificacion($datosUsuario['documentoIdentidad'])) {
            throw new UsuarioConNumeroIdentificacionYaExiste();
        }

        $this->repositorio->guardar($this->usuario);
    }
}
