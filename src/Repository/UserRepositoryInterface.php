<?php

namespace App\Repository;

use App\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function buscarUsuarioPorIdentificacion(string $documentoIdentidad): array;
    public function guardar(UserDTO $usuario): void;
    public function actualizar(UserDTO $usuario): void;
    public function eliminar(UserDTO $usuario): void;
}
