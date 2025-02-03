<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\UseCase\SaveUserUseCase;

class UserController
{
    public function guardarUsuario(array $data)
    {
        $repositorio = new UserRepository();
        (new SaveUserUseCase($repositorio))->execute($data);
        return 200;
    }
}
