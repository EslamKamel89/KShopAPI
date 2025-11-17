<?php

namespace Modules\Auth\DTO;

class RegisterUserDTO {
    public function __construct(
        public readonly String $name,
        public readonly String $email,
        public readonly String $password,
    ) {
    }
}
