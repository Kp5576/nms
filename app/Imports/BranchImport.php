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
            'branch_code' => $row['branch_code'],
            'branch_name' => $row['branch_name'],
            'address' => $row['address'],
            'port' => $row['port'],
            'ip' => $row['ip'],

            'isp_name' => $row['isp_name'],
            'operator_name' => $row['operator_name'],
            'agent_name' => $row['agent_name'],
            'customer_name' => $row['customer_name']
        ]);
    }
}
