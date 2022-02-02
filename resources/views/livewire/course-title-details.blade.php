<div>
    <label for="description">Select Course</label>
    <select class="form-select" name="course_title_id" wire:model = "CourseId"  aria-label="Default select example">
      @foreach ($Course as $value)                        
      <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
    <label for="description">Select Title</label>
    <select class="form-select" name="course_title_id" aria-label="Default select example">
        @foreach ($CourseTitle as $item)                        
        <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
    </select>
</div>
