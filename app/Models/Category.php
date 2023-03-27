<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['category'];  

    //we'll create a category table with static categories , and we'll create a foreign key in plants table to specify  which category belongs to it , and then we'll insert the id's category in plants table 
    public function plants(){
        return $this->hasMany(Plants::class);
    }
}
