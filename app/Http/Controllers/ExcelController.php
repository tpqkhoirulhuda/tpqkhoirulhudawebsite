<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;
use App\Models\Penilaian;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Buku;





class ExcelController extends Controller
{
    public function export(Request $request){

        $penilaians = Penilaian::where("user_id", $request->id)->get();
        $user = User::where("role", 0)->where('id', $request->id)->first();
        $kelas = Kelas::all();
        $kriteriaNilai = Nilai::first();
        $buku = Buku::all();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('B1:M1');
        $sheet->setCellValue('B1', 'Format Daftar NIlai SANTRI TPQ KHOIRUL HUDA');
        $styleB1 = $sheet->getStyle('B1');
        $styleB1->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $styleB1->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $styleB1->getFont()->setBold(true);

        $sheet->mergeCells('B2:M2');
        $sheet->setCellValue('B2', 'Semester Ganjil Tahun Pembelajaran 2022-2023');
        $styleB2 = $sheet->getStyle('B2');
        $styleB2->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $styleB2->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $styleB2->getFont()->setBold(true);

        // Heading
        // $sheet->mergeCells("B4:C4");
        // $sheet->setCellValue('B4', "Kelas");

        // $sheet->mergeCells("B5:C5");
        // $sheet->setCellValue('B5', "Mata Pelajaran : ");
        
        $sheet->mergeCells("B8:B10");
        $sheet->setCellValue('B8', "No.");
        $sheet->getStyle('B8:B10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);


        $sheet->mergeCells("C8:C10");
        $sheet->setCellValue('C8', "Mata Pelajaran");
        $sheet->getStyle('C8:C10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);

        $sheet->mergeCells("D8:D10");
        $sheet->setCellValue('D8', "Nama");
        $sheet->getStyle('D8:D10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);


        $sheet->mergeCells("E8:E10");
        $sheet->setCellValue('E8', "L/P");
        $sheet->getStyle('E8:E10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);


        $sheet->mergeCells("F8:F10");
        $sheet->setCellValue('F8', "Kelas");
        $sheet->getStyle('F8:F10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);


        $sheet->mergeCells("G8:N8");
        $sheet->setCellValue('G8', "FORM NILAI SANTRI");
        $sheet->getStyle('G8:N10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


        $sheet->mergeCells("G9:G10");
        $sheet->setCellValue('G9', "ABSEN");
        $sheet->getStyle('G9:G10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('G9:G10')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

        $sheet->mergeCells("H9:H10");
        $sheet->setCellValue('H9', "TUGAS");
        $sheet->getStyle('H9:H10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('H9:H10')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e26b0a');

        $sheet->mergeCells("I9:I10");
        $sheet->setCellValue('I9', "BACAAN");
        $sheet->getStyle('I9:I10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


        $sheet->mergeCells("J9:J10");
        $sheet->setCellValue('J9', "HAFALAN");
        $sheet->getStyle('J9:J10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


        $sheet->mergeCells("K9:K10");
        $sheet->setCellValue('K9', "RATA RATA");
        $sheet->getStyle('K9:K10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


        $sheet->mergeCells("L9:L10");
        $sheet->setCellValue('L9', "RATA-RATA JILID 1");
        $sheet->getStyle('L9:L10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->mergeCells("M9:M10");
        $sheet->setCellValue('M9', "N/A");
        $sheet->getStyle('M9:M10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->mergeCells("N9:N10");
        $sheet->setCellValue('N9', "KETERANGAN");
        $sheet->getStyle('N9:N10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('N9:N10')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e6b8b7');

        $styleB2 = $sheet->getStyle('B8:N10');
        $styleB2->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $styleB2->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        
        // body
        $index = 11;
        $number = 1;
        foreach($penilaians as $nilai){
            $sheet->setCellValue('B'.$index, $number);
            $sheet->getStyle('B'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('C'.$index, $buku[$nilai->buku_id-1]->jilid_buku);
            $sheet->getStyle('C'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            
            $sheet->setCellValue('D'.$index, $user->name);
            $sheet->getStyle('D'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('E'.$index, $user->gender == "Laki - Laki" ? "L" : "P");
            $sheet->getStyle('E'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('F'.$index, $kelas[$nilai->kelas_id-1]->nama_kelas);
            $sheet->getStyle('F'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('G'.$index, $nilai->absen);
            $sheet->getStyle('G'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('H'.$index, $nilai->tugas);
            $sheet->getStyle('H'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('I'.$index, $nilai->bacaan);
            $sheet->getStyle('I'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('J'.$index, $nilai->hafalan);
            $sheet->getStyle('J'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            
            $rata = ($nilai->absen*($kriteriaNilai->absen/100)) +( $nilai->tugas*($kriteriaNilai->tugas/100)) + ($nilai->bacaan*($kriteriaNilai->bacaan/100)) + ($nilai->hafalan*($kriteriaNilai->hafalan/100));
            $sheet->setCellValue('K'.$index, $rata);
            $sheet->getStyle('K'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


            $sheet->setCellValue('L'.$index, $nilai->{"rata-rata_jilid"});
            $sheet->getStyle('L'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->setCellValue('M'.$index, ($nilai->{"rata-rata_jilid"}+$rata)/2);
            $sheet->getStyle('M'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


            $sheet->setCellValue('N'.$index, ($nilai->{"rata-rata_jilid"}+$rata)/2 >= 75 ? "LULUS" : "TIDAK LULUS");
            $sheet->getStyle('N'.$index)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $index++;
            $number++;
        }

        $sheet->getStyle('I9:L'.$index-1)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('fcd5b4');
        $sheet->getStyle('K9:K'.$index-1)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('c4d79b');
        $sheet->getStyle('M9:M'.$index-1)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ccc0da');
        

        //ttd
        $sheet->setCellValue('C'.$index+1, "Mengetahui");
        $sheet->setCellValue('C'.$index+2, "Kepala Sekolah,");
        $sheet->setCellValue('C'.$index+9, "NIP.");


        $sheet->mergeCells("J".($index+2).":L".$index+2);
        $sheet->setCellValue('J'.$index+2, "Kepala Sekolah,");
        $sheet->setCellValue('J'.$index+9, "NIP.");


        //ukuran kolom
        // $sheet->getColumnDimension("B")->setWidth(30);
        $columns = [ 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I','J','K','L','M','N'];

        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        //Kriteri Penilaian
        
        // dd($kriteriaNilai->bacaan);
        $sheet->setCellValue("P9", "KKM");
        $sheet->getStyle('P9')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('808080');

        $sheet->setCellValue("Q9", "75");
        $sheet->getStyle('Q9')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

        $sheet->mergeCells("P10:Q10");
        $sheet->setCellValue("P10", "BOBOT");
        $sheet->getStyle("P10:Q10")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("P10:Q10")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("P11", "Absensi");
        $sheet->getStyle("P11")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("Q11", $kriteriaNilai->absen."%");
        $sheet->getStyle("Q11")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("P12", "Tugas");
        $sheet->getStyle("P12")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("Q12", $kriteriaNilai->tugas."%");
        $sheet->getStyle("Q12")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("P13", "Bacaan");
        $sheet->getStyle("P13")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("Q13", $kriteriaNilai->bacaan."%");
        $sheet->getStyle("Q13")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("P14", "Hafalan");
        $sheet->getStyle("P14")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("Q14", $kriteriaNilai->hafalan."%");
        $sheet->getStyle("Q14")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("P15", "Total");
        $sheet->getStyle("P15")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue("Q15", "100%");
        $sheet->getStyle("Q15")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


        $write = new Xlsx($spreadsheet);
        $filename = "test.xlsx";
        $write->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
