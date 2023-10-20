<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'slug',
        'date',
        'picture',
        'body',
    ];



    public function Category(){
    return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
