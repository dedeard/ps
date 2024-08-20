<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornes extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'fornes';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'nama_obat',
        'kelas_terapi',
        'sub_kelas_terapi',
        'empty_field', // If there's an empty field or you need to name it
        'kekuatan',
        'satuan',
        'sediaan',
        'tingkat_faskes',
        'oen',
        'program_p',
        'kanker_ca',
        'restriksi_obat',
        'restriksi_sediaan',
        'restriksi_kelas_terapi',
        'restriksi_sub_kelas_terapi',
        'restriksi_sub_sub_kelas_terapi',
        'restriksi_sub_sub_sub_kelas_terapi',
        'peresepan_maksimal',
    ];
}
