<?php

namespace App\Repository;

use App\DTO\UserDTO;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private array $usuarios = [];

    public function buscarUsuarioPorIdentificacion(string $documentoIdentidad): array
    {
        return array_filter($this->usuarios, fn($usr) => $usr->getDocumentoIdentidad() === $documentoIdentidad);
    }

    public function guardar(UserDTO $dataUsuario): void
    {
        $usuario = new User(
            $dataUsuario->nombre,
            $dataUsuario->correoElectronico,
            $dataUsuario->contrasena,
            $dataUsuario->documentoIdentidad
        );

        $this->usuarios[] = $usuario;
    }

    public function actualizar(UserDTO $dataUsuario): void
    {
        $usuario = new User(
            $dataUsuario->nombre,
            $dataUsuario->correoElectronico,
            $dataUsuario->contrasena,
            $dataUsuario->documentoIdentidad
        );

        foreach ($this->usuarios as $usr) {
            if ($usuario = $usr) {
                $usr = $usuario;
            }
        }
    }

    public function eliminar(UserDTO $dataUsuario): void
    {
        $usuario = new User(
            $dataUsuario->nombre,
            $dataUsuario->correoElectronico,
            $dataUsuario->contrasena,
            $dataUsuario->documentoIdentidad
        );

        $this->usuarios = array_filter($this->usuarios, fn($usr) => $usr !== $usuario);
    }
}
