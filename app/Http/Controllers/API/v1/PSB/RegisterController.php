<?php

namespace App\Http\Controllers\API\v1\PSB;

use App\Models\PSB\Register;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Helpers\RegNumGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pa 10001 pi 10002
        $registers = Register::all();

        if ($registers) {
            return ApiFormatter::createApi(200, 'Success', $registers);
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
                'no_regis' => 'string',
                'fullname' => 'string|required',
                'nik' => 'string|required',
                'phone' => 'string|required',
                'email' => 'string|email:rfc,dns|required',
                'program' => 'string|required',
                'option' => 'string|required',
                'id_setting' => 'integer|required',
            ]);

            $fields['no_regis'] = RegNumGenerator::get();

            $data = Register::create($fields);

            if ($data) {
                return ApiFormatter::createApi(201, 'Success', $data);
            } else {
                return ApiFormatter::createApi(500, 'Failed');
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
    public function show($id)
    {
        $register = Register::where('id', $id)->first();

        if ($register != null) {
            return ApiFormatter::createApi(200, 'Success', $register);
        } else {
            return ApiFormatter::createApi(400, 'Bad request, santri not found');
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
    public function update(Request $request, $id)
    {
        try {
            $fields = $request->validate([
                'fullname' => 'string',
                'email' => 'string|email:rfc,dns',
                'program' => 'string',
                'option' => 'string',
                'nickname' => 'string',
                'hobby' => 'string',
                'purpose' => 'string',
                'workplace' => 'string',
                'department' => 'string',
                'status' => 'string',
                'sbc' => 'string',
                'blood' => 'string',
                'dob' => 'date',
                'pob' => 'string',
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
            ]);

            Register::where('id', $id)->update($fields);

            $data = Register::where('id', $id)->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Success', $data);
            } else {
                return ApiFormatter::createApi(500, 'Failed');
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
        $register = Register::where('id', $id)->first();
        if ($register) {
            $register->delete();
            return ApiFormatter::createApi(200, 'Success destroy data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
