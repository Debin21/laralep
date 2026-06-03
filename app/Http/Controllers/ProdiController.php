<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Prodi;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index()
    {
        $data = Prodi::orderByDesc('created_at')->get();
        return view('prodi.list-prodi', ['prodi' => $data]);
    }


    public function create()
{
    return view('prodi.add-prodi', [
        'fakultas' => Fakultas::all()
    ]);
}

    public function store(Request $request)
    {
    $request->validate([
        'fakultas_id' => 'required',
        'nama_prodi' => 'required',
        'nama_kaprodi' => 'required',
        'alias_prodi' => 'required',
    ]);

    Prodi::create([
        'fakultas_id' => $request->fakultas_id,
        'nama_prodi' => $request->nama_prodi,
        'nama_kaprodi' => $request->nama_kaprodi,
        'alias_prodi' => $request->alias_prodi,
    ]);
    dd($request->all());
    return redirect('/prodi');
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit-prodi', ['prodi' => $prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi'   => ['required', 'max:100'],
            'nama_kaprodi' => ['required', 'max:100'],
            'alias_prodi'  => ['required', 'max:10'],
        ], [
            'nama_prodi.required'   => 'Nama Prodi wajib diisi',
            'nama_kaprodi.required' => 'Nama Kaprodi wajib diisi',
            'alias_prodi.required'  => 'Alias Prodi wajib diisi',
            'nama_prodi.max'        => 'Nama Prodi maksimal 100 karakter',
            'nama_kaprodi.max'      => 'Nama Kaprodi maksimal 100 karakter',
            'alias_prodi.max'       => 'Alias Prodi maksimal 10 karakter',
        ]);

        $prodi->update([
            'nama_prodi'   => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
            'alias_prodi'  => $request->alias_prodi,
        ]);

        return redirect('/prodi')->with('success', 'Prodi berhasil diperbarui');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect('/prodi')->with('success', 'Prodi berhasil dihapus');
    }
}