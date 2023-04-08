<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Validator;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ], [
            'user_id.required' => 'Kolom NIS harus diisi!.',
            'role_id.required' => 'Kolom role harus diisi!.'
        ]);

        $role_user_exist = RoleUser::where('user_id', $request->user_id)->where('role_id', $request->role_id)->first();
        if ($role_user_exist) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('failed', 'Gagal memperbaharui role, role duplikat.')
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('failed', 'Gagal memperbaharui role.')
                ->withInput();
        } else {
            $data = RoleUser::create($request->all());
            if ($data) {
                return back()->with('success', 'Role user berhasil ditambahkan!');
            }
            return back()->with('failed', 'Kesalahan pada server. Gagal menambah role. Silakan ulang beberapa saat lagi.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_id = $request->input('user_id');
        $role_id = $request->input('role_id');

        $role_user = RoleUser::where('user_id', $user_id)->where('role_id', $role_id)->first();

        if ($role_user->delete()) {
            return back()->with('success', 'Role user berhasil dihapus!');
        }
        return back()->with('failed', 'Gagal menghapus role user. Silakan ulang beberapa saat lagi.');
    }
}
