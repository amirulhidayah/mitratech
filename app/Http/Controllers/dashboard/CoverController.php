<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cover::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    $foto = '<img src="/assets/welcome/img/covers/' . $row->foto . '" alt="" height="200px" widht="200px" class="my-3">';
                    return $foto;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('cover.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
        return view('pages.dashboard.cover.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function edit(Cover $cover)
    {
        return view('pages.dashboard.cover.edit', compact('cover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cover $cover)
    {
        $validated = $request->validate(
            [
                'foto' => 'nullable|image|max:512'
            ],
            [
                'foto.required' => 'Cover Tidak Boleh Kosong',
                'foto.image' => 'Cover Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Cover Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        if ($request->foto) {
            File::delete(public_path("assets/welcome/img/covers/" . $cover->foto));
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/welcome/img/covers'), $namaFoto);
            $cover->foto = $namaFoto;
        }

        $cover->save();

        Toastr::success('Berhasil Merubah Cover', 'Success');
        return redirect()->route('cover.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cover $cover)
    {
        //
    }
}
