<?php

namespace App\Repository;

use App\User;

interface UserRepositoryInterface
{
    public function buscarUsuarioPorIdentificacion(string $documentoIdentidad): array;
    public function guardar(User $usuario): void;
    public function actualizar(User $usuario): void;
    public function eliminar(User $usuario): void;
}
