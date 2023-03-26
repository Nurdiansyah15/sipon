<?php

namespace App\Http\Controllers\API\v1\Security;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Security\SecActs;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SecActsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SecActs::all();

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
                'name' => 'string|required',
            ]);

            $data = SecActs::create($fields);

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
        $data = SecActs::where('id', $id)->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Bad request activity not found');
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
            ]);

            SecActs::where('id', $id)->update($fields);
            $data = SecActs::where('id', $id)->first();

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
        $data = SecActs::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return ApiFormatter::createApi(200, 'Success destroy data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
