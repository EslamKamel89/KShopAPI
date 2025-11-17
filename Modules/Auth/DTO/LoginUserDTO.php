<?php

namespace Modules\Auth\DTO;

class LoginUserDTO {
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ) {
    }
}
