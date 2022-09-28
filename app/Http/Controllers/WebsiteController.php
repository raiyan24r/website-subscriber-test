<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Services\WebsiteService;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\NewSubscriberRequest;
use App\Services\UserService;

class WebsiteController extends Controller
{
    /**
     * Show all websites.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::all();

        return ResponseService::apiResponse(200, "List of all websites", $websites);
    }

    /**
     * Subscribe a user to a website.
     *
     * @param  \Illuminate\Http\Requests\NewWebsiteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function newSubscriber(NewSubscriberRequest $request)
    {

        $user = User::firstOrCreate([
            'email' => $request->email,
        ], [
            'name' => $request->name,
        ]);

        try {
            $websiteService = new WebsiteService(Website::find($request->website_id));

            $websiteService->subscribeUser($user);

            return ResponseService::apiResponse(200, "User subscribed successfully");
        } catch (\Exception $e) {
            return $e;
            Log::error($e->getMessage());
            return ResponseService::apiResponse(500, "Something went wrong");
        }
    }
}
