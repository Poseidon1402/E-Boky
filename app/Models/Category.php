<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Indicates the primary key's name related to the model
     * 
     * @var string
     */
    protected $primaryKey = 'name';

    /**
     * Indicates the type of the primary key
     * 
     * @var string
     */
    public $keyType = 'string';

    /**
     * Confirm that the timestamps fields are disabled
     * 
     * @var bool
     */
    protected $timestamps = false;

    /**
     * refers to all related books
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books() {

        return $this->hasMany(Book::class, 'category', 'wording');
    }
}
