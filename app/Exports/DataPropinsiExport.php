<?php

namespace App\Exports;

use App\Models\DataPropinsiModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DataPropinsiExport implements FromArray, WithHeadings, WithCustomStartCell, WithEvents
{
    protected $kode_propinsi;
    protected $query;

    // Menambahkan konstruktor untuk menerima parameter filter
    public function __construct($kode_propinsi = null, $query = null)
    {
        $this->kode_propinsi = $kode_propinsi; // Jenis kelamin
        $this->query = $query; // Pencarian
    }

    public function array(): array
    {
        $query = DataPropinsiModel::select('kode_propinsi', 'nama_propinsi', 'remark');
        // Filter berdasarkan jenis kelamin jika ada
        if ($this->kode_propinsi) {
            $query->where('kode_propinsi', $this->kode_propinsi);
        }

        // Filter berdasarkan pencarian query (misalnya berdasarkan nama atau NIK)
        if ($this->query) {
            $query->where(function ($subQuery) {
                $subQuery->where('kode_propinsi', 'like', '%' . $this->query . '%')
                    ->orWhere('akreditasi', 'like', '%' . $this->query . '%');
            });
        }
        $data = $query->get()->toArray();
        $formattedData = array_map(function ($item, $index) {
            return array_merge(['No' => $index + 1], $item);
        }, $data, array_keys($data));

        return $formattedData; // Mengembalikan data yang sudah diformat
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Propinsi',
            'Nama Propinsi',
            'Ket',
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
                $event->sheet->getDelegate()->mergeCells('A2:D2');

                // Menempatkan teks "Laporan Data DPT" di A2
                $event->sheet->setCellValue('A2', 'Laporan Data Propinsi');

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
                $event->sheet->getStyle('A3:D3')->applyFromArray([
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
        ];
    }
}
