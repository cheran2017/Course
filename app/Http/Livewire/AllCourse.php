<?php

namespace App\Http\Livewire;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Category;
use App\Models\Course;
use App\Models\Technology;
use Livewire\Component;

class AllCourse extends Component
{
    public $CoursePrice;
    public $Category;
    public $Technology;
    public $Course;

    public $GetCategory;
    public $GetTechnology;
    public $GetPrice;

    public $FindCategory;
    public $FindTechnology;

    public function render()
    {
        if($this->GetCategory != 0 && $this->GetTechnology == 0 && $this->GetPrice == 0)
        {
            $this->FindCategory = Category::find($this->GetCategory);
            $this->Course       = $this->FindCategory->Course()->get();
        }
        elseif($this->GetCategory == 0 && $this->GetTechnology != 0 && $this->GetPrice == 0)
        {
            $this->FindTechnology = Technology::find($this->GetTechnology);
            $this->Course         = $this->FindTechnology->Course()->get();
        }
        elseif($this->GetCategory == 0 && $this->GetTechnology == 0 && $this->GetPrice != 0)
        {
            $this->Course  = QueryBuilder::for(Course::class)->where('id',$this->GetPrice)->get();
        }
        elseif($this->GetCategory != 0 && $this->GetTechnology != 0 && $this->GetPrice == 0)
        {  
            $Category     = $this->GetCategory($this->GetCategory);
            $Technology   = $this->GetTechnology($this->GetTechnology);
            $this->Course = Course::whereIn('id',array_intersect($Category,$Technology))->get();
        }
        elseif($this->GetCategory == 0 && $this->GetTechnology != 0 && $this->GetPrice != 0)
         {
            $Category     = $this->GetTechnology($this->GetTechnology);
            $Technology   = QueryBuilder::for(Course::class)->where('id',$this->GetPrice)->get()->pluck('id')->toArray();
            $this->Course = Course::whereIn('id',array_intersect($Category,$Technology))->get();
         }
         elseif($this->GetCategory != 0 && $this->GetTechnology == 0 && $this->GetPrice != 0)
         {
            $Category      = $this->GetCategory($this->GetCategory);
            $Technology    = QueryBuilder::for(Course::class)->where('id',$this->GetPrice)->get()->pluck('id')->toArray();
            $this->Course = Course::whereIn('id',array_intersect($Category,$Technology))->get();
         }
         elseif($this->GetCategory != 0 && $this->GetTechnology != 0 && $this->GetPrice != 0)
         {
            $Category     = $this->GetCategory($this->GetCategory);
            $Technology   = $this->GetTechnology($this->GetTechnology);
            $Course       = QueryBuilder::for(Course::class)->where('id',$this->GetPrice)->get()->pluck('id')->toArray();
            $this->Course = Course::whereIn('id',array_intersect(array_intersect($Category,$Technology),$Course))->get();
         }
        else
        {
            $this->Course      = QueryBuilder::for(Course::class)->get();
        }

        $this->CoursePrice = QueryBuilder::for(Course::class)->select(['id','price'])->get();
        $this->Category    = QueryBuilder::for(Category::class)->get();
        $this->Technology  = QueryBuilder::for(Technology::class)->get();

        return view('livewire.all-course');
    }

    public function GetCategory($Category){
        $this->FindCategory = Category::find($this->GetCategory);
        $CategoryId         = $this->FindCategory->Course()->get()->pluck('id')->toArray();
        return $CategoryId;
    }
    public function GetTechnology($Technology){
        $this->FindTechnology = Technology::find($Technology);
        $TechnologyId         = $this->FindTechnology->Course()->get()->pluck('id')->toArray();
        return $TechnologyId;
    }


}
