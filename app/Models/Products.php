<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $fillable = [
        "title",
        "desc",
        "price",
        "image",
    ];
    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
