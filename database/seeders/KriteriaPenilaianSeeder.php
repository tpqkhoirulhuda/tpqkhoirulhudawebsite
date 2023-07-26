<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nilai;

class KriteriaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::create([
            'tugas'=> 60,
            'bacaan' => 10,
            'hafalan' => 10,
            'absen' => 10,
            'rata-rata_jilid' => 10,
        ]);
    }
}
