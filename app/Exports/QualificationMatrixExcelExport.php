<?php

namespace App\Exports;

use App\Models\Vacancy;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class QualificationMatrixExcelExport implements FromView, WithDrawings, WithEvents
{
    public $vacancyId;

    public function __construct($vacancyId)
    {
        $this->vacancyId = $vacancyId;
    }

    public function view(): View
    {
        return view('excel.qualification-matrix', [
            'vacancy' => Vacancy::with([
                'position',
                'applications',
                'applications.applicant_profile',
                'applications.applicant_education',
                'applications.applicant_eligibility',
                'applications.applicant_training',
                'applications.applicant_volunteer_work',
                'applications.applicant_work_experience',
                'applications.applicant_other',
                ])
                ->where('id', $this->vacancyId)
                ->first()
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setPath(storage_path('app/public/images/header.png'));
        $drawing->setHeight(100);
        $drawing->setWidth(400); 
        $drawing->setCoordinates('A1');

        $drawing->setOffsetX(650);
        $drawing->setOffsetY(0);

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                $sheet->getStyle('A8:K100')->getAlignment()->setWrapText(true);

                $sheet->getColumnDimension('A')->setWidth(10);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(20);
                $sheet->getColumnDimension('D')->setWidth(20);
                $sheet->getColumnDimension('E')->setWidth(20);
                $sheet->getColumnDimension('F')->setWidth(20);
                $sheet->getColumnDimension('G')->setWidth(20);
                $sheet->getColumnDimension('H')->setWidth(20);
                $sheet->getColumnDimension('I')->setWidth(20);
                $sheet->getColumnDimension('J')->setWidth(20);
                $sheet->getColumnDimension('K')->setWidth(20);
                $sheet->getRowDimension(21)->setRowHeight(40);
            },
        ];
    }
}

