<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = ['period', 'nominal', 'document'];

    public function scholarshipType()
    {
      return $this->belongsTo(ScholarshipType::class);
    }

    public function students()
    {
      return $this->belongsToMany(Student::class);
    }
}
