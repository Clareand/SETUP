@extends('baseStudent.main')
@section('content')
@include('baseAdmin.alerts')
<div class="row">
    <div class="col-xl-12">
       <div class="row margin-1">
           <div class="col-lg-4 top-2">
            <h1 class="display-3">
                Hallo @if (Auth::user()&&Auth::user()->id_role==2){{Auth::user()->name}}@endif, <br>
                Yuk Mulai Belajar di SETUP
            </h1>
            <h6 class="lead">Temukan kelasmu sekarang!</h6>
            <br><br>
            <a href="=" class="btn btn-olive btn-lg">
                Find Class
            </a>
           </div>
           <div class="col-lg-8">
               <div class="img width-80">
                   <img class="rounded mx-auto d-block img-fluid" src="{{url('assets/img/picture/main_pict.png')}}" alt="" srcset="">
               </div>
           </div>
       </div>
    </div>
</div>
<br><br>
@if ($status!='fail')
<div class="row">
    <div class="col-xl-12">
        <div class="text-center">
            <h1 class="display-4 text-gray-dark">Learning Path Choices</h1>
            <h5 class="lead text-gray">Pilih alur belajarmu!</h5>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    @foreach ($result as $item)
    <div class="col-lg-3">
        <div class="card card-cascade narrower">
        <div class="view view-cascade narrower overlay crop">
            @if ($item['badge']['image'])
            <img src="{{ Storage::url( $item['badge']['image']) }}" class="rounded img-thumbnail" alt="..." style='object-fit: fill;'/>
            @else
            <img class="card-img-top" src="{{url('assets/img/picture/cyan-forest.jpg')}}" alt=""/>
            @endif
        </div>
        <div class="card-body card-body-cascade">
            <h5 class="pb-2 pt-1">
              {{$item['tech_field']['name']}}
            </h5>
            <h3 class="font-weight-bold card-title text-center">
              {{$item['name']}}
            </h3>
            <p class="card-text" style="height:10rem;">
              {{$item['description']}}
            </p>
              {{-- <input type="hidden" name="id_class" value="{{$item['id']}}"> --}}
              <a href="{{url('app/path/class/list/'.$item['id'])}}" class="btn btn-olive">Detail</a>
          </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection