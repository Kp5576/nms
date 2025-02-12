<?php

namespace App\Imports;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class BranchImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Branch([
            //
            'Branch Code' => $row['branch_code'],
            'Branch Name' => $row['branch_name'],
            'Address' => $row['address'],
            'Port' => $row['port'],
            'IP Address' => $row['ip'],
            
            'Isp Name' => $row['isp_name'],
            'Operator Name' => $row['operator_name'],
            'Agent Name' => $row['agent_name']
        ]);
    }
}
