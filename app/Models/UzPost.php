<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UzCategory;
class UzPost extends Model
{
    use HasFactory, SoftDeletes;
    public function category()
    {
        return $this->belongsTo(UzCategory::class, 'uz_category_id', 'id');
    }
}
