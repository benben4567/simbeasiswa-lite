<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Major;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;

class FirstSheetStudentsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
  public function model(array $row)
  {
        return new Student([
        'major_id' => $row['kdprodi'],
        'nama' => $row['nama'],
        'nim' => $row['nim'],
        'no_hp' => $row['no_hp']
      ]);
  }

  public function batchSize(): int
  {
      return 100;
  }

  public function uniqueBy()
  {
      return 'nim';
  }
}
