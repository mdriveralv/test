<?php

namespace App\Repository;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    private array $usuarios = [];

    public function buscarUsuarioPorIdentificacion(string $documentoIdentidad): array
    {
        return array_filter($this->usuarios, fn($usr) => $usr->getDocumentoIdentidad() === $documentoIdentidad);
    }

    public function guardar(User $usuario): void
    {
        $this->usuarios[] = $usuario;
    }

    public function actualizar(User $usuario): void
    {
        foreach ($this->usuarios as $usr) {
            if ($usuario = $usr) {
                $usr = $usuario;
            }
        }
    }

    public function eliminar(User $usuario): void
    {
        $this->usuarios = array_filter($this->usuarios, fn($usr) => $usr !== $usuario);
    }
}
