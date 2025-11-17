<?php

namespace Modules\Auth\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;
use Modules\Auth\DTO\LoginUserDTO;

class LoginUserAction {
    /**
     * Summary of execute
     * @param LoginUserDTO $dto
     * @return array{token: string, user: User}|null
     */
    public function execute(LoginUserDTO $dto) {
        $user = User::where('email', $dto->email)->first();
        if (!$user || !Hash::check($dto->password, $user->password)) {
            return null;
        }
        return [
            'user' => $user,
            'token' => $user->createToken($user->email)->plainTextToken,
        ];
    }
}
