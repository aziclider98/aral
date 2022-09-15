<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EnCategory;
class EnPost extends Model
{
    use HasFactory, SoftDeletes;
    public function category()
    {
        return $this->belongsTo(EnCategory::class, 'en_category_id', 'id');
    }
}
