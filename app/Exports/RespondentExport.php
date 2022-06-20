<?php

namespace App\Exports;

use App\Models\Respondent;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class RespondentExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function headings():array
    {
        return [
            'r_id','name','phone_1','phone_2','phone_3','phone_4','email','occupation','region','county',
            'sub_county','district','division','location','sub_location','constituency','ward','setting','gender','exact_age','education_level','marital_status','religion','income','lsm','ethnic_group','employment_status','age_group'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Respondent::getRespondent());
    }

    /**
     * Styling the spreadsheet
     */

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event)
            {
                $event->sheet->getStyle('A1:X1')->applyFromArray([
                    'font' => [
                        'bold' => 'true'
                    ]
                ]);
            }
        ];
    }
}
