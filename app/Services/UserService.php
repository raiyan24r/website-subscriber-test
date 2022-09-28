<?php

namespace App\Services;

class UserService
{

    public function createNewUser($request)
    {
        $user = User::create($request->validated());

        return ResponseService::basicResponse(201, "New User created successfully!", null, $user);
    }
}
