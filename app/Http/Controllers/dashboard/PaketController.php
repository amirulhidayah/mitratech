<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiturPaket;
use App\Models\Paket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paket::with('fiturPaket');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('fitur', function (Paket $paket) {
                    $fiturPaket = '';
                    foreach ($paket->fiturPaket as $fitur) {
                        $fiturPaket .= '<div class="d-block">
                                    <!-- Text -->
                                    <p><i class="fas fa-check mr-2 text-success"></i>' . $fitur->fitur . '</p>

                                </div>';
                    }
                    return $fiturPaket;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('paket.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';

                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePaket">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'fitur'])
                ->make(true);
        }
        return view('pages.dashboard.paket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.paket.create');
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
                'harga' => 'required',
                'fitur' => 'required',
                'urutan' => [
                    'required',
                    Rule::unique('paket')->withoutTrashed()
                ]
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'harga.required' => 'Harga Tidak Boleh Kosong',
                'fitur.required' => 'Fitur Tidak Boleh Kosong',
                'urutan.required' => 'Urutan Tidak Boleh Kosong',
                'urutan.unique' => 'Urutan Sudah Ada'
            ]
        );

        $paket = new Paket();
        $paket->nama = $request->nama;
        $paket->harga = $request->harga;
        $paket->urutan = $request->urutan;
        $paket->save();

        foreach ($request->fitur as $fitur) {
            $fiturPaket[] = [
                'fitur' => $fitur,
                'paket_id' => $paket->id
            ];
        }

        DB::table('fitur_paket')->insert($fiturPaket);

        Toastr::success('Berhasil Menambahkan Paket', 'Success');
        return redirect()->route('paket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('pages.dashboard.paket.edit', compact(['paket']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'harga' => 'required',
                'fitur' => 'required',
                'urutan' => [
                    'required',
                    Rule::unique('paket')->ignore($paket->id)->withoutTrashed()
                ],
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'harga.required' => 'Harga Tidak Boleh Kosong',
                'fitur.required' => 'Fitur Tidak Boleh Kosong',
                'urutan.required' => 'Urutan Tidak Boleh Kosong',
                'urutan.unique' => 'Urutan Sudah Ada'
            ]
        );

        $paket->nama = $request->nama;
        $paket->harga = $request->harga;
        $paket->urutan = $request->urutan;
        $paket->save();

        foreach ($request->fitur as $fitur) {
            $fiturPaket[] = [
                'fitur' => $fitur,
                'paket_id' => $paket->id
            ];
        }

        DB::table('fitur_paket')->where('paket_id', $paket->id)->delete();
        DB::table('fitur_paket')->insert($fiturPaket);

        Toastr::success('Berhasil Mengubah Paket', 'Success');
        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        $paket->fiturPaket()->delete();
        $paket->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'Paket Berhasil Dihapus'
        ]);
    }
}
