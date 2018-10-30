<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\LoginFormRequest;
use JWTAuth;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

    /**
     * register user
     *
     * @param UserFormRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(UserFormRequest $request)
    {

        $user = User::create($request->all());
        return new UserResource($user);
    }

    /**
     * login user
     *
     * @param LoginFormRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'Invalid Credentials.'
            ], 400);
        }
        return response([
            'token' => 'Bearer ' . $token
        ]);
    }



    /**
     * refresh token
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }
}
