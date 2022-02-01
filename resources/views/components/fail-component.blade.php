<div>
    {{--success message--}}
    @if(session('fail'))
    <div class="alert alert-danger m-4 ">
        {{session('fail')}}
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