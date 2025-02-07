<?php

namespace App\Exports;

use App\Models\NMS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NmsExport implements FromCollection, WithHeadings
{
    /**
     * Retrieve the data for export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return NMS::leftJoin('users', 'nms.member_id', '=', 'users.id')->where('users.role_id', '=', 2)
            ->leftJoin('isp', 'nms.isp_id', '=', 'isp.id')              
            ->leftJoin('agent', 'nms.agent_id', '=', 'agent.id')        
            ->leftJoin('customer', 'nms.customer_id', '=', 'customer.id') 
            ->select([
                'nms.id',
                'users.name as member_name',                    
                'isp.name as isp_name',                          
                'agent.name as agent_name',                      
                'customer.name as customer_name',                
                'nms.isp_members_names',
                'nms.agent_members_names',
                'nms.customer_members_names',
                'nms.ip_address',
                'nms.port',
            ])->get();
    }

    /**
     * Define the column headings.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Member Name',
            'ISP Name',
            'Agent Name',
            'Customer Name',
            'ISP Members Names',
            'Agent Members Names',
            'Customer Members Names',
            'IP Address',
            'Port',
        ];
    }
}
