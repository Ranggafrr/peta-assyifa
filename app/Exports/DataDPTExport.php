<?php

namespace App\Exports;

use App\Models\DptModel;
<<<<<<< HEAD
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DataDPTExport implements FromArray, WithHeadings, WithCustomStartCell, WithEvents
{
    protected $gender;
    protected $query;

    // Menambahkan konstruktor untuk menerima parameter filter
    public function __construct($gender = null, $query = null)
    {
        $this->gender = $gender; // Jenis kelamin
        $this->query = $query; // Pencarian
    }

    public function array(): array
    {
        $query = DptModel::select('nama', 'jenis_kelamin', 'tanggal_lahir', 'dusun_jalan_alamat', 'rt', 'rw', 'nik', 'nomor_hp', 'remark');
        // Filter berdasarkan jenis kelamin jika ada
        if ($this->gender) {
            $query->where('jenis_kelamin', $this->gender);
        }

        // Filter berdasarkan pencarian query (misalnya berdasarkan nama atau NIK)
        if ($this->query) {
            $query->where(function ($subQuery) {
                $subQuery->where('nama', 'like', '%' . $this->query . '%')
                    ->orWhere('nik', 'like', '%' . $this->query . '%');
            });
        }
        $data = $query->get()->toArray();
        $formattedData = array_map(function ($item, $index) {
            return array_merge(['No' => $index + 1], $item);
        }, $data, array_keys($data));

        return $formattedData; // Mengembalikan data yang sudah diformat
=======
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataDPTExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DptModel::select('id_dpt', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'dusun_jalan_alamat', 'rt', 'rw', 'nik', 'nomor_hp', 'remark')->get();
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Dusun/Jalan/Alamat',
            'RT',
            'RW',
            'NIK',
            'Nomor HP',
            'Ket',
<<<<<<< HEAD
        ];
    }

    public function startCell(): string
    {
        return 'A3'; // Heading dimulai dari baris ketiga
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Merge cell untuk judul dari A2 sampai J2
                $event->sheet->getDelegate()->mergeCells('A2:J2');

                // Menempatkan teks "Laporan Data DPT" di A2
                $event->sheet->setCellValue('A2', 'Laporan Data DPT');

                // Styling untuk judul
                $event->sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                // Menambahkan border dan warna latar belakang abu-abu pada header
                $event->sheet->getStyle('A3:J3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'e4e4e7'], // Warna abu-abu
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
=======
            // Add more columns as needed
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
        ];
    }
}
