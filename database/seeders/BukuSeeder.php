<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'jilid_buku'=> "Jilid 1",
            'nama_buku'=> "Jilid 1"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 2",
            'nama_buku'=> "Jilid 2"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 3",
            'nama_buku'=> "Jilid 3"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 4",
            'nama_buku'=> "Jilid 4"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 5",
            'nama_buku'=> "Jilid 5"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 6",
            'nama_buku'=> "Jilid 6"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 7",
            'nama_buku'=> "Jilid 7"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 8",
            'nama_buku'=> "Jilid 8"
        ]);

        Buku::create([
            'jilid_buku'=> "Jilid 9",
            'nama_buku'=> "Jilid 9"
        ]);
    }
}
