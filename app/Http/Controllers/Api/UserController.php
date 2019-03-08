<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create(
            array_merge(
                $request->only('email'),
                [
                    'name' => ucwords($request->name),
                    'password' => bcrypt($request->password)
                ]
            )
        );

        foreach ($request->roles as $role) {
            $user->roles()->attach(Role::find($role));
        }

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(
            array_merge(
                $request->except('password', 'roles'),
                [
                    'password' => bcrypt($request->password)
                ]
            )
        );

        $roles = Role::all();

        foreach ($roles as $role) {
            if (!in_array($role->id, $request->roles)) {
                $user->roles()->detach($role);
            }
        }

        foreach ($request->roles as $role) {
            $user->roles()->attach(Role::find($role));
        }

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
