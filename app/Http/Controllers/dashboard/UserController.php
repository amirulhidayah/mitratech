<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Tim;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    $foto = '<img src="/assets/dashboard/users/' . $row->foto . '" alt="" height="100px" class="my-3">';
                    return $foto;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('user.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';

                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('pages.dashboard.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'username' => 'required|unique:users',
                'password' => 'required|min:4',
                'foto' => 'required|image|max:512',
                'role' => 'required',
            ],
            [
                'name.required' => 'Nama Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'email.email' => 'Email Tidak Valid',
                'username.required' => 'Username Tidak Boleh Kosong',
                'username.unique' => 'Username Sudah Ada',
                'password.required' => 'Password Tidak Boleh Kosong',
                'password.min' => 'Password Minimal 4 Karakter',
                'role.required' => 'Role Tidak Boleh Kosong',
                'foto.required' => 'Foto Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        $namaFileFoto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/dashboard/users'), $namaFileFoto);

        $validatedData['foto'] = $namaFileFoto;
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = Str::random(10);

        User::create($validatedData);
        Toastr::success('Berhasil Menambahkan User', 'Success');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
