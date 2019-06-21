<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
    	$data_siswa = \App\Siswa::all();
    	return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
    	\App\Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses','Tambah Data Sukses !');    	
    }

    public function edit($id)
    {
    	$judul = "Edit Data Siswa";
    	$siswa = \App\siswa::find($id);
    	return view('siswa/edit',['judul' => $judul, 'siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
    	$siswa = \App\siswa::find($id);
    	$siswa->update($request->all());
    	return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
    	$siswa = \App\siswa::find($id);
    	$siswa->delete();
    	return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }
}
