@if (Session::has('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="fa fa-times-circle"></i></span>
    <span class="alert-text"><strong>Something it's Wrong: </strong> 
        <br>
        @foreach (Session::get('errors') as $e)
            {{$e}} <br>
        @endforeach
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif

@if (Session::has('success'))
<div class="alert alert-default alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
    <span class="alert-text"><strong>Success! </strong> 
        <br>
        @foreach (Session::get('success') as $s)
            {{$s}} <br>
        @endforeach
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> 
@endif

@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
    <span class="alert-text"><strong>Warning! </strong> 
        <br>
        @foreach (Session::get('warning') as $w)
            {{$w}} <br>
        @endforeach
    </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> 
@endif