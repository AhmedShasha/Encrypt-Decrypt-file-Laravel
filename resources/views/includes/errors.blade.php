@if ($errors->any())
    <div class="alert alert-danger col-md-12">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>    
@endif