@extends('baseStudent.main')
@section('content')
@include('baseAdmin.alerts')
<div class="row">
    <div class="col-xl-12">
       <div class="row margin-1">
           <div class="col-lg-4 top-2">
            <h1 class="display-3">
                Hello {{Auth::user()->name}}, <br>
                Lorem Ipsum sir dolor amet Vestibulum porta nibh
            </h1>
            <h6 class="lead">Lorem Ipsum sir dolor</h6>
            <br><br>
            <a href="=" class="btn btn-olive btn-lg">
                Find Class
            </a>
           </div>
           <div class="col-lg-8">
               <div class="img width-80">
                   <img class="rounded mx-auto d-block img-fluid" src="{{url('assets/img/picture/cyan-forest.jpg')}}" alt="" srcset="">
               </div>
           </div>
       </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-xl-12">
        <div class="text-center">
            <h1 class="display-4 text-gray-dark">Learning Path Choices</h1>
            <h5 class="lead text-gray">Lorem Ipsum sir</h5>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    @foreach ($result as $item)
    <div class="col-lg-3">
        <div class="card card-cascade narrower">
        <div class="view view-cascade narrower overlay">
            <img class="card-img-top" src="{{url('assets/img/picture/cyan-forest.jpg')}}" alt=""/>
        </div>
        <div class="card-body card-body-cascade">
            <h5 class="pb-2 pt-1">
            {{$item['tech_field']['name']}}
            </h5>
            <h4 class="font-weight-bold card-title">
            {{$item['name']}}
            </h4>
            <p class="card-text" style="height:23rem;">
            {{$item['description']}}
            </p>
            <form action="{{url('class/enroll')}}" method="POST">
            @csrf
            <input type="hidden" name="id_class" value="{{$item['id']}}">
            <button type="submit" class="btn btn-olive">Enroll</button>
            </form>
        </div>
        </div>
    </div>
    @endforeach
</div>
@endsection