<?php

namespace App\Http\Controllers\dashboard;

use App\Models\PlatformProjek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class PlatformProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PlatformProjek::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('platformProjek.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';

                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePlatformProjek">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.dashboard.platformProjek.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.platformProjek.create');
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
                'nama' => [
                    'required',
                    Rule::unique('platform_projek')->withoutTrashed()
                ]
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'nama.unique' => 'Nama Tidak Boleh Sama'
            ]
        );

        $platformProjek = new PlatformProjek();
        $platformProjek->nama = $request->nama;
        $platformProjek->save();

        Toastr::success('Berhasil Menambahkan Platform Projek', 'Success');
        return redirect()->route('platformProjek.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlatformProjek  $platformProjek
     * @return \Illuminate\Http\Response
     */
    public function show(PlatformProjek $platformProjek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlatformProjek  $platformProjek
     * @return \Illuminate\Http\Response
     */
    public function edit(PlatformProjek $platformProjek)
    {
        return view('pages.dashboard.platformProjek.edit', compact('platformProjek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlatformProjek  $platformProjek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlatformProjek $platformProjek)
    {
        $validated = $request->validate(
            [
                'nama' => [
                    'required',
                    Rule::unique('platform_projek')->ignore($platformProjek->id)->withoutTrashed()
                ],
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'nama.unique' => 'Nama Tidak Boleh Sama'
            ]
        );

        $platformProjek->nama = $request->nama;
        $platformProjek->save();

        Toastr::success('Berhasil Mengubah Platform Projek', 'Success');
        return redirect()->route('platformProjek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlatformProjek  $platformProjek
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlatformProjek $platformProjek)
    {
        $platformProjek->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'Platform Projek Berhasil Dihapus'
        ]);
    }
}
