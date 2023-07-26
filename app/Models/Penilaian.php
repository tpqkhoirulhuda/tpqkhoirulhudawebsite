<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';

    protected $foreignkey = ['user_id', 'buku_id', 'kelas_id'];

    protected $fillable = [
        'user_id',
        'buku_id',
        'kelas_id',
       'tugas',
       'bacaan',
       'hafalan',
       'absen',
       'rata-rata_jilid'
    ];

    // Define the User relationship (belongsTo)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Define the Buku relationship (belongsTo)
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    // Define the Kelas relationship (belongsTo)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
