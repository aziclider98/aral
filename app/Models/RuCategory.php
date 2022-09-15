<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuCategory extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(RuPost::class);
    }
}
