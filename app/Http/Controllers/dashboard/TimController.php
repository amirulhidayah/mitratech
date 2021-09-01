<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tim;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tim::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('tim.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';

                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteTim">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.dashboard.tim.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.tim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'posisi' => 'required',
                'urutan' => 'required|unique:tim',
                'foto' => 'required|image|max:512'
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'posisi.required' => 'Posisi Tidak Boleh Kosong',
                'urutan.required' => 'Urutan Tidak Boleh Kosong',
                'urutan.unique' => 'Urutan Sudah Ada',
                'foto.required' => 'Foto Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        $namaFoto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/welcome/img/teams'), $namaFoto);

        $tim = new Tim();
        $tim->nama = $request->nama;
        $tim->posisi = $request->posisi;
        $tim->urutan = $request->urutan;
        $tim->foto = $namaFoto;
        $tim->save();

        Toastr::success('Berhasil Menambahkan Tim', 'Success');
        return redirect()->route('tim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function edit(Tim $tim)
    {
        return view('pages.dashboard.tim.edit', compact('tim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tim $tim)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'posisi' => 'required',
                'urutan' => [
                    'required',
                    Rule::unique('tim')->ignore($tim->id)
                ],
                'foto' => 'nullable|image|max:512'
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'posisi.required' => 'Posisi Tidak Boleh Kosong',
                'urutan.required' => 'Urutan Tidak Boleh Kosong',
                'urutan.unique' => 'Urutan Sudah Ada',
                'foto.required' => 'Foto Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        if ($request->foto) {
            File::delete(public_path("assets/welcome/img/teams/" . $tim->foto));
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/welcome/img/teams'), $namaFoto);
            $tim->foto = $namaFoto;
        }

        $tim->nama = $request->nama;
        $tim->posisi = $request->posisi;
        $tim->urutan = $request->urutan;
        $tim->save();

        Toastr::success('Berhasil Merubah Tim', 'Success');
        return redirect()->route('tim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tim $tim)
    {
        File::delete(public_path("assets/welcome/img/teams/" . $tim->foto));
        $tim->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'Tim Berhasil Dihapus'
        ]);
    }
}
