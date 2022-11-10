<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'pageNumber', 'category', 'language'];

    public $timestamps = false;
    /**
     * Refers to the related category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {

        return $this->belongsTo(Category::class, 'category', 'wording');
    }

    /**
     * Refers to the related category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language() {

        return $this->belongsTo(Language::class, 'language', 'name');
    }
}
