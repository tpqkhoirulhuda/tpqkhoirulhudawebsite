<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penilaian;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penilaian::create([
            'user_id' => 2,
            'buku_id' => 1,
            'kelas_id' => 2,
            'tugas'=> null,
            'bacaan' => null,
            'hafalan' => null,
            'absen' => null,
            'rata-rata_jilid' => null,
        ]);
    }
}
