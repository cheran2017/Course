<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPgDegree extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'passed_out',
        'studying_year',
        'user_id',
        'degree_id',
        'college_id',
        'specializtion_id',

    ];


    public function degree()
    {
        return $this->hasOne(Degree::class,'id','degree_id');
    }
    public function college()
    {
        return $this->hasOne(College::class,'id','college_id');
    }
    public function specialization()
    {
        return $this->hasOne(Specializtion::class,'id','specializtion_id');
    }
}
