@if(count($errors) > 0) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session()->get('success')) 
    <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
@endif

@if(session()->get('error')) 
    <div class="alert alert-danger" role="alert">
            {{session()->get('error')}}
        </div>
@endif
