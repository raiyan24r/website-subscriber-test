<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNewPostRequest;
use App\Services\ResponseService;

class PostController extends Controller
{


    /**
     * Store a newly created Post in database.
     *
     * @param  \Illuminate\Http\Requests\CreateNewPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateNewPostRequest $request)
    {
        $post = Post::create($request->validated());

        return ResponseService::apiResponse(201, "New Post created to website successfully!", $post);
    }


}
