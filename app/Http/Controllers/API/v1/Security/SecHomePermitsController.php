<?php

namespace App\Http\Controllers\API\v1\Security;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Security\SecHomePermits;
use Illuminate\Validation\ValidationException;

class SecHomePermitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SecHomePermits::with('santri')->get();

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
                'nis_approval' => 'string|required',
                'nis_recipient' => 'string|required',
                'go' => 'date|required',
                'return' => 'date|required',
                'arrival' => 'date|required',
                'status' => 'boolean|required',
                'is_lead_approval' => 'boolean|required',
                'description' => 'string|required'
            ]);

            $data = SecHomePermits::create($fields);

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
        $data = SecHomePermits::where('id', $id)->with('santri')->first();

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
                'nis_approval' => 'string',
                'nis_recipient' => 'string',
                'go' => 'date',
                'return' => 'date',
                'arrival' => 'date',
                'status' => 'boolean',
                'is_lead_approval' => 'boolean',
                'description' => 'string'
            ]);

            SecHomePermits::where('id', $id)->update($fields);
            $data = SecHomePermits::where('id', $id)->with('santri')->first();

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
        $data = SecHomePermits::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return ApiFormatter::createApi(200, 'Success destroy data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
