<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class StudentsImport implements WithMultipleSheets
{
  use WithConditionalSheets;

  public function conditionalSheets(): array
  {
      return [
          'data' => new FirstSheetStudentsImport(),
      ];
  }
}
