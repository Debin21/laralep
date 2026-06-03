<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $data = Fakultas::orderByDesc('created_at')->get();
        return view('fakultas.list-fakultas', ['fakultas' => $data]);
    }

    public function create()
    {
        return view('fakultas.add-fakultas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => ['required', 'max:100'],
            'nama_dekan'    => ['required', 'max:100'],
        ], [
            'nama_fakultas.required' => 'Nama Fakultas wajib diisi',
            'nama_dekan.required'    => 'Nama Dekan wajib diisi',
            'nama_fakultas.max'      => 'Nama Fakultas maksimal 100 karakter',
            'nama_dekan.max'         => 'Nama Dekan maksimal 100 karakter',
        ]);

        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas,
            'nama_dekan'    => $request->nama_dekan,
        ]);

        return redirect('/fakultas')->with('success', 'Fakultas berhasil ditambahkan');
    }

    public function show(Fakultas $fakultas)
    {
        //
    }

    public function edit(Fakultas $fakulta)
    {
        return view('fakultas.edit-fakultas', ['fakultas' => $fakulta]);
    }

    public function update(Request $request, Fakultas $fakulta)
    {
        $request->validate([
            'nama_fakultas' => ['required', 'max:100'],
            'nama_dekan'    => ['required', 'max:100'],
        ], [
            'nama_fakultas.required' => 'Nama Fakultas wajib diisi',
            'nama_dekan.required'    => 'Nama Dekan wajib diisi',
            'nama_fakultas.max'      => 'Nama Fakultas maksimal 100 karakter',
            'nama_dekan.max'         => 'Nama Dekan maksimal 100 karakter',
        ]);

        $fakulta->update([
            'nama_fakultas' => $request->nama_fakultas,
            'nama_dekan'    => $request->nama_dekan,
        ]);

        return redirect('/fakultas')->with('success', 'Fakultas berhasil diperbarui');
    }

    public function destroy(Fakultas $fakulta)
    {
        $fakulta->delete();
        return redirect('/fakultas')->with('success', 'Fakultas berhasil dihapus');
    }
}