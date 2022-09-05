<?php

namespace App\Imports;

use App\Models\Store;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StoresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Store([
            "store_id" => $row[0],
            "title" => $row[1],
            "address" => $row[2],
            "suburb" => $row[3],
            "state" => $row[4],
            "zip" => $row[5],
            "lat" => $row[6],
            "lng" => $row[7],
            
            
         
        ]);
    }
}
