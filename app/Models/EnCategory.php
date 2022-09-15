<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnPost;
class EnCategory extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(EnPost::class);
    }
}
