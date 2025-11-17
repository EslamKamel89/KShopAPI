<?php

namespace Modules\Auth\Actions;

use Modules\Auth\Models\User;
use Modules\Auth\DTO\RegisterUserDTO;

class RegisterUserAction {
    /**
     * Summary of execute
     * @param RegisterUserDTO $dto
     * @return array{token: string, user: User}
     */
    public function execute(RegisterUserDTO $dto) {
        $user =  User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
        ]);
        return [
            'user' => $user,
            'token' => $user->createToken($user->email)->plainTextToken,
        ];
    }
}
