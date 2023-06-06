<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa_hana;
use App\Models\Mahasiswa_hanas;
use Illuminate\Http\Request;

class MahasiswaHanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $mahasiswas = Mahasiswa_hana::latest()->paginate(20);
    return view('mahasiswa.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 20);
}
    /**
     * Show the form for creating a new resource.se
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_identitas' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'prodi' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
        ]);

        
        //dd($request->all());

        mahasiswa_hana::create($request->all());
      
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Data berhasil disimpan.');
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
    public function edit($id_identitas)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa_hana $mahasiswas)
    {
        $request->validate([
            'id_identitas' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'prodi' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
        ]);

        $mahasiswas->update($request->all());
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa_hana $mahasiswas)
    {
        $mahasiswas->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function report()
    {
        $mahasiswas = Mahasiswa_hana::latest()->paginate(20);
        return view('mahasiswas.report', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 20);
    }
}
