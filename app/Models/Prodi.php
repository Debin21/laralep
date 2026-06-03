<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    protected $fillable = [
        'fakultas_id',
        'nama_prodi',
        'nama_kaprodi',
        'alias_prodi',
        'photo_kaprodi'
    ];

    $photoKaprodi = storage::disk("public")->putFile('prodi', $request->file('photo_kaprodi'));

    $validated['photo_kaprodi'] = $photoKaprodi

    Prodi::create($validated);

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}