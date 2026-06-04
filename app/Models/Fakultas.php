<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    // protected $table = 'fakultas'; // nama tabel
    // protected $primaryKey = 'id'; // primary key
    // protected $keyType = 'int'; // tipe data primary key

    protected $fillable = ['nama_fakultas', 'singkatan'];
}
