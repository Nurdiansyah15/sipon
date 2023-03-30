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
                'nik' => 'string|required|unique:registers,nik',
                'phone' => 'string|required|unique:registers,nik',
                'email' => 'string|email:rfc,dns|required|unique:registers,nik',
                'program' => 'string|required',
                'option' => 'string|required',
                'setting_id' => 'integer|required',
                'password' => 'string|required'
            ]);

            $fields['no_regis'] = RegNumGenerator::get();
            $fields['password'] = bcrypt($fields['password']);
            $fields['status'] = '0';

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
                'fullname' => 'string|nullable',
                'email' => 'string|nullable|email:rfc,dns',
                'password' => 'string|nullable',
                'program' => 'string|nullable',
                'option' => 'string|nullable',
                'nickname' => 'string|nullable',
                'hobby' => 'string|nullable',
                'purpose' => 'string|nullable',
                'motivation_entry' => 'string|nullable',
                'workplace' => 'string|nullable',
                'department' => 'string|nullable',
                'status' => 'string|nullable',
                'sbc' => 'string|nullable',
                'blood' => 'string|nullable',
                'dob' => 'date|nullable',
                'pob' => 'string|nullable',
                'grade_id' => 'string|nullable',
                'room_id' => 'string|nullable',
                'phone' => 'string|nullable',
                'address' => 'string|nullable',
                'district' => 'string|nullable',
                'sub_district' => 'string|nullable',
                'province' => 'string|nullable',
                'postal_code' => 'string|nullable',
                'nisn' => 'size:20|string|nullable',
                'no_kip' => 'size:20|string|nullable',
                'no_pkh' => 'size:20|string|nullable',
                'no_kks' => 'size:20|string|nullable',
                'home_status' => 'string|nullable',
                'nik' => 'size:20|string|nullable',
                'no_kk' => 'size:20|string|nullable',
                'father' => 'string|nullable',
                'father_pn' => 'string|nullable',
                'father_nik' => 'string|nullable',
                'father_job' => 'string|nullable',
                'father_graduate' => 'string|nullable',
                'father_income' => 'string|nullable',
                'mother' => 'string|nullable',
                'mother_pn' => 'string|nullable',
                'mother_nik' => 'string|nullable',
                'mother_job' => 'string|nullable',
                'mother_graduate' => 'string|nullable',
                'mother_income' => 'string|nullable',
                'guardian' => 'string|nullable',
                'guardian_pn' => 'string|nullable',
                'guardian_nik' => 'string|nullable',
                'guardian_job' => 'string|nullable',
                'guardian_graduate' => 'string|nullable',
                'guardian_income' => 'string|nullable',
                'guardian_relationship' => 'string|nullable',
                'previous_pondok_name' => 'string|nullable',
                'previous_pondok_address' => 'string|nullable',
                'path_photo' => 'string|nullable',
                'path_bill' => 'string|nullable',
                'path_doc' => 'string|nullable',
                'path_mutasi_emis' => 'string|nullable',
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
