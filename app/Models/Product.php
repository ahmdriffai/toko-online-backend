<?php

namespace App\Models;

use App\Traits\Uuids;
use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Uuids;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
