<div>
 {{--success message--}}
 @if(session('success'))
 <div class="alert alert-success m-4 ">
    {{session('success')}}
  </div>
  @endif
  
  {{--validation errors--}}
  @if ($errors->any())
  <div class="alert alert-danger m-4 ">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
</div>