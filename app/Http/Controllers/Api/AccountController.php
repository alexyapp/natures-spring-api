<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class AccountController extends Controller
{
    /**
     * Update user's name and email.
     * 
     * @param \App\Http\Requests\ProfileRequest $request
     * @return \App\Http\Resources\UserResource
     */
    public function profile(ProfileRequest $request)
    {
        $request->user()->update($request->all());

        return new UserResource($request->user());
    }

    /**
     * Update user's password.
     * 
     * @param \App\Http\Requests\PasswordRequest $request
     * @return \App\Http\Resources\UserResource
     */
    public function password(PasswordRequest $request)
    {
        if (password_verify($request->old_password, $request->user()->password)) {
            $request->user()->update(
                [
                    'password' => bcrypt($request->new_password)
                ]
            );
    
            return new UserResource($request->user());
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect old password.'
            ], 403);
        }
    }

    /**
     * Verify a user's password before they can update their name and/or email.
     * 
     * @param \App\Http\Requests\VerifyRequest $request
     */
    public function verify(Request $request)
    {
        if (password_verify($request->password, $request->user()->password)) {
            return response()->json([
                'success' => true,
                'message' => 'Account verification success.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password.'
            ], 401);
        }
    }
}
