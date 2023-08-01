<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "koong",
            'email' => "koong@gmail.com",
            'password' => bcrypt('1234567890'),
            'alamat' => "tangerang",
            'noTelp' => "0987654321",
            'role' => 0,
            'jenis_kelamin' => "Laki-laki",
            'tempat_lahir' => "Singkawang",
            'tanggal_lahir' => "2003-11-01", 
            'ibu' => null,
            'kelas_id' => null,
        ]);

        User::create([
            'name' => "nehe",
            'email' => "neheg@guru.kh.ac.id",
            'password' => bcrypt('1234567890'),
            'alamat' => "tangerang",
            'noTelp' => "0987654321",
            'role' => 2,
            'jenis_kelamin' => "Laki-laki",
            'tempat_lahir' => "JakSel",
            'tanggal_lahir' => "2003-11-01", 
            'ibu' => null,
            'kelas_id' => null,
        ]);

        User::create([
            'name' => "nehe & koong",
            'email' => "adminng@admin.kh.ac.id",
            'password' => bcrypt('1234567890'),
            'alamat' => "tangerang",
            'noTelp' => "0987654321",
            'role' => 1,
            'jenis_kelamin' => "Laki-laki",
            'tempat_lahir' => "JakSel",
            'tanggal_lahir' => "2003-11-01", 
            'ibu' => null,
            'kelas_id' => null,
        ]);
    }

}
