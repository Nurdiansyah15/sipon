<?php

namespace App\Http\Controllers\API\v1;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Santri;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Helpers\NisGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pa 10001 pi 10002
        $santris = Santri::all();

        if ($santris) {
            return ApiFormatter::createApi(200, 'Success', $santris);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function boys()
    {
        $santris = Santri::where('option', '1')->get();

        if ($santris) {
            return ApiFormatter::createApi(200, 'Success', $santris);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function girls()
    {
        $santris = Santri::where('option', '2')->get();

        if ($santris) {
            return ApiFormatter::createApi(200, 'Success', $santris);
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
        $fields = $request->validate([
            'username' => 'string|required',
            'fullname' => 'string|required',
            'program' => 'string|required',
            'option' => 'string|required',
        ]);


        // Check email
        $user = User::where('username', $fields['username'])->first();
        if ($user !== null) {

            $fields['nis'] = NisGenerator::get($fields['option']);
            $fields['user_id'] = $user->id;
            $fields['status'] = '1';
            $fields['sbc'] = '1';
            $fields['joined_at'] = Carbon::now()->toDateTimeString();

            $santri = Santri::create($fields);

            $data = Santri::where('nis', $santri->nis)->with('user')->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Success', $data);
            } else {
                return ApiFormatter::createApi(500, 'Failed');
            }
        } else {

            $newUser = User::create([
                'username' => $fields['username'],
                'password' => bcrypt($fields['username'])
            ]);

            RoleUser::create([
                "user_id" => $newUser->id,
                "role_id" => 2 //default santri
            ]);

            $fields['nis'] = NisGenerator::get($fields['option']);
            $fields['user_id'] = $newUser->id;
            $fields['status'] = '1';
            $fields['sbc'] = '1';
            $fields['joined_at'] = Carbon::now()->toDateTimeString();

            $santri = Santri::create($fields);

            $data = Santri::where('nis', $santri->nis)->with('user')->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Success', $data);
            } else {
                return ApiFormatter::createApi(500, 'Failed');
            }
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
    public function show($nis)
    {
        $santri = santri::where('nis', $nis)->first();

        if ($santri) {
            return ApiFormatter::createApi(200, 'Success', $santri);
        } else {
            return ApiFormatter::createApi(400, 'Bad request');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $nis) //belum jadi
    {
        try {
            $fields = $request->validate([
                'nickname' => 'string',
                'email' => 'email:rfc,dns',
                'fullname' => 'string',
                'hobby' => 'string',
                'purpose' => 'string',
                'workplace' => 'string',
                'department' => 'string',
                'status' => 'boolean',
                'sbc' => 'string',
                'blood' => 'string',
                'dob' => 'date',
                'pob' => 'string',
                'program' => 'string',
                'grade_id' => 'string',
                'room_id' => 'string',
                'phone' => 'string',
                'address' => 'string',
                'district' => 'string',
                'sub_district' => 'string',
                'province' => 'string',
                'postal_code' => 'string',
                'nisn' => 'string',
                'no_kip' => 'string',
                'no_pkh' => 'string',
                'no_kks' => 'string',
                'home_status' => 'string',
                'nik' => 'string',
                'no_kk' => 'string',
                'father' => 'string',
                'father_pn' => 'string',
                'father_nik' => 'string',
                'father_job' => 'string',
                'father_graduate' => 'string',
                'father_income' => 'string',
                'mother' => 'string',
                'mother_pn' => 'string',
                'mother_nik' => 'string',
                'mother_job' => 'string',
                'mother_graduate' => 'string',
                'mother_income' => 'string',
                'guardian' => 'string',
                'guardian_pn' => 'string',
                'guardian_nik' => 'string',
                'guardian_job' => 'string',
                'guardian_graduate' => 'string',
                'guardian_income' => 'string',
                'path_photo' => 'string',
                'option' => 'string',
            ]);

            Santri::where('nis', $nis)->update($fields);

            $data = Santri::where('nis', $nis)->first();


            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
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
    public function destroy($nis)
    {
        //automatic delete after delete user reference
    }
}
