<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\RuCategory;
class RuPost extends Model
{
    use HasFactory, SoftDeletes;
    public function category()
    {
        return $this->belongsTo(RuCategory::class, 'ru_category_id', 'id');
    }
}
