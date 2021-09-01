<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Projek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PlatformProjek;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Projek::with('platformProjek');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('platform', function (Projek $projek) {
                    return $projek->platformProjek->nama;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('projek.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';

                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProjek">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'platform'])
                ->make(true);
        }
        return view('pages.dashboard.projek.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platformProjek = DB::table('platform_projek')->get();
        return view('pages.dashboard.projek.create', compact('platformProjek'));
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
                'judul' => 'required',
                'platform' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|image|max:512',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul Tidak Boleh Kosong',
                'platform.required' => 'Platform Tidak Boleh Kosong',
                'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
                'foto.required' => 'Foto Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb',
                'isi.required' => 'Isi Tidak Boleh Kosong'
            ]
        );

        $namaFoto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/welcome/img/projek/foto'), $namaFoto);

        $projek = new Projek();
        $projek->judul = $request->judul;
        $projek->platform_projek_id = $request->platform;
        $projek->isi = $request->isi;
        $projek->deskripsi = $request->deskripsi;
        $projek->foto = $namaFoto;
        $projek->save();

        Toastr::success('Berhasil Menambahkan Projek', 'Success');
        return redirect()->route('projek.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function show(Projek $projek)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function edit(Projek $projek)
    {
        $platformProjek = DB::table('platform_projek')->get();
        return view('pages.dashboard.projek.edit', compact(['projek', 'platformProjek']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projek $projek)
    {
        $validated = $request->validate(
            [
                'judul' => 'required',
                'platform' => 'required',
                'deskripsi' => 'required',
                'foto' => 'nullable|image|max:512',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Judul Tidak Boleh Kosong',
                'platform.required' => 'Platform Tidak Boleh Kosong',
                'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
                'foto.image' => 'Foto Harus Berupa Sebuah Gambar',
                'foto.max' => 'Ukuran Foto Tidak Boleh Lebih Dari 500 Kb',
                'isi.required' => 'Isi Tidak Boleh Kosong'
            ]
        );

        if ($request->foto) {
            File::delete(public_path("assets/welcome/img/projek/foto/" . $projek->foto));
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/welcome/img/projek/foto'), $namaFoto);
            $projek->foto = $namaFoto;
        }



        $projek->judul = $request->judul;
        $projek->platform_projek_id = $request->platform;
        $projek->isi = $request->isi;
        $projek->deskripsi = $request->deskripsi;
        $projek->save();

        Toastr::success('Berhasil Mengupdate Projek', 'Success');
        return redirect()->route('projek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projek $projek)
    {
        File::delete(public_path("assets/welcome/img/projek/foto/" . $projek->foto));
        $projek->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'Projek Berhasil Dihapus'
        ]);
    }
}
