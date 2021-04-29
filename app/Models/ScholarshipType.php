<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sponsor'];

    public function scholarships()
    {
      return $this->hasMany(Scholarship::class);
    }
}
