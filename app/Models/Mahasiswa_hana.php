<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_hana extends Model
{
    use HasFactory;
    public $table = "mahasiswa_hanas";
    public $primaryKey = "id_identitas";

    //tambahkan kode berikut
    protected $fillable = [
        'id_identitas',
        'nama',
        'jeniskelamin',
        'prodi',
        'agama',
        'nik',
        'nohp',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
    ];
}
