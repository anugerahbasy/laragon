<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // field yang boleh diisi mass assignment
    protected $fillable = ['nama', 'npm', 'prodi_id', 'foto']; 

    // relasi dengan Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
