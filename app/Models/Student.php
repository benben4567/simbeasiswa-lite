<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['major_id', 'nama', 'nim', 'no_hp'];

    public function major()
    {
      return $this->belongsTo(Major::class);
    }

    public function scholarships()
    {
      return $this->belongsToMany(Scholarship::class);
    }

    public function setNamaAttribute($nama)
    {
      return $this->attributes['nama'] = strtoupper($nama);
    }
}
