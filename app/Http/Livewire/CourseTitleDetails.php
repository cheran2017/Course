<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseTitle;
use Livewire\Component;

class CourseTitleDetails extends Component
{
    public $CourseId;
    public $Course;
    public $CourseTitle;
    public function render()
    {
        $this->Course = Course::get();
        $this->CourseTitle = CourseTitle::where('course_id',$this->CourseId)->get();
        return view('livewire.course-title-details');
    }
}
