<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class BranchExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return DB::table('branch_master')->select('branch_code','branch_name','address','ip','port','operator_name','isp_name','agent_name')->get();
    }

    public function headings(): array
    {
        return [
            'Branch Code',
            'Branch Name',
            'Address',
            'IP Address',
            'Port',
            'ISP Name',
            'Agent Name',
            'Operator Name',

        ];
    }
}
