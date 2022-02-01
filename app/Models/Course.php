<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'short_description',
        'price',
        'detailed_description',
        'image',
        'video_url',
    ];

     //for roles to permissio
     public function Technology()
     {
         return $this->belongsToMany(Technology::class, 'course_technologies')->withTimestamps();
     }

     //for roles to permissio
     public function Learning()
     {
         return $this->HasMany(Learning::class);
     }

     //for roles to permissio
     public function Enquiry()
     {
         return $this->HasMany(Enquiry::class);
     }
      //for roles to permissio
      public function CourseTitle()
      {
          return $this->HasMany(CourseTitle::class);
      }
}
