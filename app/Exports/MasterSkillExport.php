<?php

namespace App\Exports;

use App\Models\SkillModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterSkillExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SkillModel::select('id', 'nama_skill', 'remark')->get();
    }

    public function headings(): array{
        return [
            'No',
            'Nama Skill',
            'Ket',
            // Add more columns as needed
        ];   
    }
}
