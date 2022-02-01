<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTitleDetail extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'course_title_id',
        'description',
    ];


    public function courseTitle()
    {
        return $this->hasOne(CourseTitle::class,'id','course_title_id');
    }
}
