<?php

namespace App\Http\Controllers\API\v1\PSB;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\PSB\PsbSetting;
use App\Helpers\RegNumGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class PsbSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = PsbSetting::all();

        if ($settings) {
            return ApiFormatter::createApi(200, 'Success', $settings);
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
                'name' => 'string|required',
                'start_period' => 'date_format:"Y-m-d H:i:s"|required',
                'end_period' => 'date_format:"Y-m-d H:i:s"|required',
                'quota_tahfidh_pa' => 'string|required',
                'quota_tahfidh_pi' => 'string|required',
                'quota_kitab_pa' => 'string|required',
                'quota_kitab_pi' => 'string|required',
                'cost_pa' => 'string|required',
                'rekening_pa' => 'string|required',
                'rekening_pi' => 'string|required',
                'status' => 'string|required',
            ]);

            $data = PsbSetting::create($fields);

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
        $setting = PsbSetting::where('id', $id)->first();

        if ($setting != null) {
            return ApiFormatter::createApi(200, 'Success', $setting);
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
                'name' => 'string',
                'start_period' => 'date_format:"Y-m-d H:i:s"',
                'end_period' => 'date_format:"Y-m-d H:i:s"',
                'quota_tahfidh_pa' => 'string',
                'quota_tahfidh_pi' => 'string',
                'quota_kitab_pa' => 'string',
                'quota_kitab_pi' => 'string',
                'cost_pa' => 'string',
                'rekening_pa' => 'string',
                'rekening_pi' => 'string',
                'status' => 'string',
            ]);

            PsbSetting::where('id', $id)->update($fields);

            $data = PsbSetting::where('id', $id)->first();

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
        $setting = PsbSetting::where('id', $id)->first();
        if ($setting) {
            $setting->delete();
            return ApiFormatter::createApi(200, 'Success destroy data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
