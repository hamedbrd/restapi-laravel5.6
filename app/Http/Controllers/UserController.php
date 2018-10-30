<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Http\Resources\Users;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller implements UserInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        try {
            return UserResource::collection(User::paginate(2));

        } catch (\Exception $e) {
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request): object
    {
        try {
            $user = User::create($request->all());
            return new UserResource($user);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): object
    {
        try {

            $user = User::findorfail($id);
            return new UserResource($user);

        } catch (\Exception $e) {
            abort(404);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id): object
    {
        try {

            $user = User::findorfail($id);
            $user->update($request->all());

            return new UserResource($user);

        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): object
    {
        try {

            $user = User::findorfail($id);
            $user->delete();

            return response([
                'status' => 'success',
                'message' => 'Deleted successfully',
            ], 200);

        } catch (\Exception $e) {
            abort(404);
        }
    }

}
