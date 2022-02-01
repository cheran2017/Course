<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];


     //for roles to permissio
     public function Course()
     {
         return $this->belongsToMany(Course::class, 'category_courses')->withTimestamps();
     }
}
