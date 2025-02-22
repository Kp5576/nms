<?php

namespace App\Imports;

use App\Models\NMS;
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
        return new NMS([
            //
            'branch_code' => $row['branch_code'],
            'branch_name' => $row['branch_name'],
            'address' => $row['address'],
            'port' => $row['port'],
            'ip_address' => $row['ip_address'],


        ]);
    }
}
