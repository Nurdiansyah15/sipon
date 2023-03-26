<?php

namespace App\Http\Controllers\API\v1\Security;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Security\SecActsPermits;
use Illuminate\Validation\ValidationException;

class SecActsPermitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SecActsPermits::with('santri', 'activity')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
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
                'nis' => 'string|required',
                'nis_user' => 'string|required',
                'sec_acts_id' => 'integer|required',
                'confirmed' => 'boolean|required',
                'reason' => 'string|required'
            ]);

            $data = SecActsPermits::create($fields);

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
    public function show($id)
    {
        $data = SecActsPermits::where('id', $id)->with('santri', 'activity')->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
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
    public function update(Request $request, $id)
    {
        try {
            $fields = $request->validate([
                'nis' => 'string',
                'nis_user' => 'string',
                'sec_acts_id' => 'integer',
                'confirmed' => 'boolean',
                'reason' => 'string'
            ]);

            SecActsPermits::where('id', $id)->update($fields);
            $data = SecActsPermits::where('id', $id)->with('santri', 'activity')->first();

            if ($data) {
                return ApiFormatter::createApi(201, 'Updated', $data);
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
    public function destroy($id)
    {
        $data = SecActsPermits::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return ApiFormatter::createApi(200, 'Success destroy data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
