<?php

namespace App\Imports;

use App\Models\Glaze;
use Maatwebsite\Excel\Concerns\ToModel;

class GlazeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Glaze([
            'id'     => $row[0],
            'name'    => $row[1],
            'dept' => $row[2],
            'shift' => $row[3],
            'grub' => $row[4],
            'spray' => $row[5],
            'density' => $row[6],
            'viscosity' => $row[7],
            'weight' => $row[8],
        ]);
    }
}
