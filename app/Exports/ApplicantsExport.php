<?php

namespace App\Exports;
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ApplicantsExport implements FromCollection, WithHeadings, WithMapping, WithDrawings, WithCustomStartCell, WithEvents
{
    public function collection()
    {
        return User::whereHas('applicant_profile', function ($query) {
                        $query->where('is_latest', 1); 
                    })
                    ->get()
                    ->each(function ($user) {
                        $user->makeHidden(['id', 'is_active', 'created_at', 'updated_at', 'deleted_at']);
                        if ($user->applicant_profile) {
                            $user->applicant_profile->makeHidden(['id', 'created_at', 'updated_at', 'deleted_at']);
                        }
                    });
    }

    public function startCell(): string
    {
        return 'A12';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setPath(storage_path('app/public/images/header.png'));
        $drawing->setHeight(100);
        $drawing->setWidth(400);
        $drawing->setCoordinates('A1');

        $drawing->setOffsetX(350);
        $drawing->setOffsetY(0);

        return $drawing;
    }

    public function headings(): array
    {
        return ['#', 'First Name', 'Middle Name', 'Last Name', 'Email', 'Mobile No'];
    }

    public function map($user): array
    {
        static $index = 1;
        return [
            $index++,  // Increment the index on each row
            $user->applicant_profile->first_name,
            $user->applicant_profile->middle_name,
            $user->applicant_profile->last_name,
            $user->email,
            $user->mobile_no
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                
                $sheet->setCellValue('A9', 'LIST OF PARTICIPANTS');
                $sheet->mergeCells('A9:F9');
                $sheet->getStyle('A9')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A9')->getAlignment()->setHorizontal('center');
                $sheet->setCellValue('A10', 'DOLE-REGIONAL OFFICE NO. XI');
                $sheet->mergeCells('A10:F10');
                $sheet->getStyle('A10')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A10')->getAlignment()->setHorizontal('center');

                $sheet->getColumnDimension('A')->setWidth(5);
                $sheet->getColumnDimension('B')->setWidth(30);
                $sheet->getColumnDimension('C')->setWidth(30); 
                $sheet->getColumnDimension('D')->setWidth(20); 
                $sheet->getColumnDimension('E')->setWidth(30);
                $sheet->getColumnDimension('F')->setWidth(20);

                $sheet->getStyle('A12:F12')->getFont()->setBold(true);
                $sheet->getStyle('A12:F12')->getAlignment()->setHorizontal('center');
            },
        ];
    }
}
