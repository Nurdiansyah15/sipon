<?php

namespace App\Http\Controllers\API\v1;

use Exception;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        if ($users) {
            return ApiFormatter::createApi(200, 'Success', $users);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $fields = $request->validate([
                'nis_santri' => 'required|string',
                'password' => 'required|string'
            ]);

            $user = User::create([
                'nis_santri' => $fields['nis_santri'],
                'password' => bcrypt($fields['password'])
            ]);

            RoleUser::create([
                "user_id" => $user->id,
                "role_id" => 2 //default santri
            ]);

            $data = User::where('id', $user->id)->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Created', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (ValidationException $error) {
            return ApiFormatter::createApi(400, $error->errors());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nis_santri)
    {
        $user = User::where('nis_santri', $nis_santri)->with('roles')->first();
        if ($user !== null) {
            return ApiFormatter::createApi(200, 'Success', $user);
        } else {
            return ApiFormatter::createApi(404, 'User is not found');
        }
    }

    /**
     * Show the form for editing the specified resource.    
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nis_santri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nis_santri)
    {
        try {
            $fields = $request->validate([
                'nis_santri' => 'string',
            ]);

            User::where('nis_santri', $nis_santri)->update([
                $fields
            ]);

            $data = User::where('nis_santri', $nis_santri)->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Created', $data);
            } else {
                return ApiFormatter::createApi(400, 'Bad request');
            }
        } catch (ValidationException $error) {
            return ApiFormatter::createApi(400, $error->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //automatic delete after delete santri reference
    }
}
