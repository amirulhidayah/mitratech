<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('logo', function ($row) {
                    $logo = '<img src="/assets/welcome/img/client/' . $row->logo . '" alt="" height="50px" widht="50px" class="my-3">';
                    return $logo;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('client.edit', $row->id) . '" class="edit btn btn-success btn-sm my-2">Edit</a>';
                    $actionBtn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteClient">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['logo', 'action'])
                ->make(true);
        }
        return view('pages.dashboard.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.client.create');
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
                'logo' => 'required|image|max:512'
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'logo.required' => 'Logo Tidak Boleh Kosong',
                'logo.image' => 'Logo Harus Berupa Sebuah Gambar',
                'logo.max' => 'Ukuran Logo Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        $namaLogo = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('assets/welcome/img/client/'), $namaLogo);

        $client = new Client();
        $client->nama = $request->nama;
        $client->logo = $namaLogo;
        $client->save();

        Toastr::success('Berhasil Mengubah Client', 'Success');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('pages.dashboard.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'logo' => 'required|image|max:512'
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'logo.required' => 'Logo Tidak Boleh Kosong',
                'logo.image' => 'Logo Harus Berupa Sebuah Gambar',
                'logo.max' => 'Ukuran Logo Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        if ($request->logo) {
            File::delete(public_path("assets/welcome/img/client/" . $client->logo));
            $namaLogo = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/welcome/img/client/'), $namaLogo);
            $client->logo = $namaLogo;
        }

        $client->nama = $request->nama;
        $client->save();

        Toastr::success('Berhasil Menambahkan Client', 'Success');
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        File::delete(public_path("assets/welcome/img/client/" . $client->logo));
        $client->delete();
        return response()->json([
            'res' => 'success',
            'message' => 'Client Berhasil Dihapus'
        ]);
    }
}
