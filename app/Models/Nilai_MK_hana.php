<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_MK_Hana extends Model
{
    use HasFactory;
    public $table = "nilai__m_k_hanas";
    public $primaryKey = "id_mk";

    //tambahkan kode berikut
    protected $fillable = [
        'id_mk',
        'namamk',
        'nilaimk',
    ];
}
