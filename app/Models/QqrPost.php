<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\QqrCategory;
class QqrPost extends Model
{
    use HasFactory, SoftDeletes;
    public function category()
    {
        return $this->belongsTo(QqrCategory::class, 'qqr_category_id', 'id');
    }
}
