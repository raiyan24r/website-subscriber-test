<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class UserService
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //
    public function createNewUser($request)
    {
        $user = User::create($request->validated());

        return ResponseService::basicResponse(201, "New User created successfully!", null, $user);
    }

    /**
     * Check if email for a post has already been sent to a user
     * 
     * @param Post $post
     */
    public function checkIfEmailSent(Post $post)
    {
        $userEmailLog = $this->user->emailLogs()->where('post_id', $post->id)->first();
        if ($userEmailLog) {
            return true;
        }

        return false;
    }
}
