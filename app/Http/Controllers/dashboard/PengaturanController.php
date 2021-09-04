<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaturan = Pengaturan::find(1)->first();
        return view('pages.dashboard.pengaturan.index', compact(['pengaturan']));
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
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaturan $pengaturan)
    {
        $validated = $request->validate(
            [
                'nama_website' => 'required',
                'slogan' => 'required',
                'kontak' => 'required',
                'email' => 'required',
                'logo' => 'nullable|mimes:png|max:512'
            ],
            [
                'nama_website.required' => 'Nama Website Tidak Boleh Kosong',
                'slogan.required' => 'Slogan Tidak Boleh Kosong',
                'kontak.required' => 'Kontak Tidak Boleh Kosong',
                'logo.mimes' => 'Logo Harus Berekstensi .PNG',
                'logo.max' => 'Ukuran Logo Tidak Boleh Lebih Dari 500 Kb'
            ]
        );

        if ($request->logo) {
            File::delete(public_path("assets/welcome/img/" . $pengaturan->logo));
            $namaLogo = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/welcome/img/'), $namaLogo);
            $pengaturan->logo = $namaLogo;
        }

        $pengaturan->nama_website = $request->nama_website;
        $pengaturan->slogan = $request->slogan;
        $pengaturan->kontak = $request->kontak;
        $pengaturan->email = $request->email;
        $pengaturan->save();

        Toastr::success('Berhasil Merubah Pengaturan', 'Success');
        return redirect()->route('pengaturan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
