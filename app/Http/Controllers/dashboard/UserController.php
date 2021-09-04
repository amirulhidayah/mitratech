<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Tim;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
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
        if (Auth::user()->role == 1) {
            if ($request->ajax()) {
                $data = User::all();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('foto', function ($row) {
                        $foto = '<img src="/assets/dashboard/users/' . $row->foto . '" alt="" height="100px" class="my-3">';
                        return $foto;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="/user/' . $row->id . '/edit" class="edit btn btn-success btn-sm my-2">Edit</a>';

                        $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Hapus</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['foto', 'action'])
                    ->make(true);
            }
            return view('pages.dashboard.user.index');
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 1) {
            return view('pages.dashboard.user.create');
        } else {
            abort(404);
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
        if (Auth::user()->role == 1) {
            return view('pages.dashboard.user.edit', ['user' => $user]);
        } else {
            abort(404);
        }
    }

    public function editProfile(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return view('pages.dashboard.user.edit_profile', ['user' => $user]);
        } else {
            abort(404);
        }
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
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => [
                    'required',
                    'min:4',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'username' => [
                    'required',
                    Rule::unique('users', 'username')->ignore($user->id),
                ],
                'password' => 'required|min:4',
                'foto' => 'nullable|image|max:512',
                'role' => 'required',
            ],
            [
                'name.required' => 'Nama Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'email.unique' => 'Email Sudah Ada',
                'username.required' => 'Username Tidak Boleh Kosong',
                'username.unique' => 'Username Sudah Ada',
                'username.min' => 'Username Minimal 4 Karakter',
                'password.required' => 'Password Tidak Boleh Kosong',
                'password.min' => 'Password Minimal 4 Karakter',
                'foto.required' => 'Foto Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb',
                'role.required' => 'Role Tidak Boleh Kosong',
            ]
        );

        if ($request->foto) {
            if ($request->foto != 'empty-picture.png') {
                File::delete(public_path("assets/dashboard/users" . $user->foto));
            }
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/dashboard/users'), $namaFoto);
            $user->foto = $namaFoto;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password == $request->password_old) {
            $user->password = $request->password;
        } else {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        if (Auth::user()->role == 1) {
            Toastr::success('Berhasil Merubah User', 'Success');
            return redirect('/user');
        } else {
            Toastr::success('Berhasil Merubah Profile', 'Success');
            return redirect('/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->foto != 'empty-picture.png') {
            File::delete(public_path("assets/dashboard/users/" . $user->foto));
        }
        $user->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'User Berhasil Dihapus'
        ]);
    }
}
