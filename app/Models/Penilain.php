<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilain extends Model
{
    use HasFactory;

    protected $primaryKey = ['user_id', 'buku_id', 'kelas_id'];

    protected $fillable = [
       'tugas',
       'bacaan',
       'hafalan',
       'absen',
       'rata-rata_jilid'
    ];
}
