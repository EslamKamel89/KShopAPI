<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Database\Factories\UserFactory;
use App\Models\User as BaseUser;

class User extends BaseUser {
    use HasFactory;

    protected static function newFactory(): UserFactory {
        return UserFactory::new();
    }
}
