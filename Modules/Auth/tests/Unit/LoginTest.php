<?php

namespace Modules\Auth\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase {
    use RefreshDatabase;

    public function test_user_can_login(): void {
        $user = User::factory()->create();
        $this->postJson(route('api.v1.auth.login'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertJsonStructure(['token']);
    }
}
