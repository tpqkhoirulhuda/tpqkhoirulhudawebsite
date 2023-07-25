<?php

use App\Models\Penilain;

trait DefaultPenilaianTrait{
    private function defaultPenilaianRecord($user_id, $kelas_id){
        $bukuIds = Buku::pluck('id');

        foreach ($bukuIds as $bukuId) {
            $penilain = new Penilain([
                'user_id' => $user_id,
                'buku_id' => $bukuId,
                'kelas_id' => $kelas_id,
                'tugas' => 0, // Set any default values as needed
                'bacaan' => 0,
                'hafalan' => 0,
                'absen' => 0,
                'rata-rata_jilid' => 0,
            ]);

            // Save the Penilain record to the database
            $penilain->save();
        }
    }
}