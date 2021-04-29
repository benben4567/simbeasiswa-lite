<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['degree', 'name'];

    public function getFullNameAttribute()
    {
      return "{$this->degree} {$this->name}";
    }

    public function students()
    {
      return $this->hasMany(Student::class);
    }
}
