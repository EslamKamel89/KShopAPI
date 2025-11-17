<?php

namespace Modules\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Actions\LoginUserAction;
use Modules\Auth\Actions\RegisterUserAction;
use Modules\Auth\DTO\LoginUserDTO;
use Modules\Auth\DTO\RegisterUserDTO;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;

class AuthController extends Controller {
    public function register(RegisterRequest $request, RegisterUserAction $action) {
        $data = $action->execute(new RegisterUserDTO(...$request->validated()));
        return response()->json([
            'token' => $data['token']
        ]);
    }
    public function login(LoginRequest $request, LoginUserAction $action) {
        $data  = $action->execute(new LoginUserDTO(...$request->validated()));
        if ($data && $data['user']) {
            $user = $data['user'];
            $token = $data['token'];
            return response()->json([
                'token' => $token
            ]);
        }
        return response()->json([
            'message' => 'invalid credentials'
        ], 401);
    }
}
