<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obats';
    protected $fillable = [
        'kode',
        'namaobat',
        'dosis',
        'efek',
        'kategori',
        'jenis_obat'
    ];
    public static function Join() {
        $data = DB::table('obats')
            ->join('jenis', 'obats.jenis_obat', 'jenis.id') //tabel obats dijoinin sama tabel jenis. jenis obat di tabel obat itu akan memiliki nilai yang sama dengan id pada tabel jenis, karena mereka uda digabungin
            ->join('bentuks', 'obats.kategori', 'bentuks.id')
            ->select('obats.*', 'jenis.jenisobat', 'bentuks.bentuk') //yg obats di select all(*) 
            ->get();

        return $data;
    }
}
