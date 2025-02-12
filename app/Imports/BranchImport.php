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
            'branch_code' => $row['Branch code'],
            'branch_name' => $row['Branch Name'],
            'address' => $row['Address'],
            'ip' => $row['IP Address'],
            'port' => $row['Port'],
            'isp_name' => $row['Isp Name'],
            'operator_name' => $row['Operator Name'],
            'agent_name' => $row['Agent Name']
        ]);
    }
}
