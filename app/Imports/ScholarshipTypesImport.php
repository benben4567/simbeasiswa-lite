<?php

namespace App\Imports;

use App\Models\ScholarshipType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScholarshipTypesImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
      return new ScholarshipType([
        'name' => $row['name'],
        'sponsor' => $row['sponsor'],
      ]);
    }
}
