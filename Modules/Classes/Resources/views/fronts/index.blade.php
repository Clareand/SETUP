@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12 col-md-12 text-center" style="margin-top: 5vh">
            <h1 class="display-2 text-white">Class to Learn</h1>
            <p class="text-white mt-0 mb-5">Etiam non massa arcu. Nullam venenatis leo ex, eu placerat nisi tincidunt vitae. 
              Suspendisse potenti. Nam pretium diam nec libero fermentum dictum. Morbi varius ligula non lacus consequat, 
              non rhoncus nulla ultricies. Sed non luctus augue.</p>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
@include('baseAdmin.alerts')
    <div class="row">
      <div class="col-xl-12">
        <div class="row margin-1">
            <div class="col-lg-12 top-2 text-center">
             <h1 class="display-3">
                 Class List
             </h1>
             <h6 class="lead"></h6>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="card bg-teal-pastel">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <h3 for="input-username" style="font-size:large;font-weight:300">Find Class</h3>
                  <input type="text" id="input-username" class="form-control" name="search">
              </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <h4 for="input-username" class="text-center" style="font-size:x-large;font-weight:400">Learning Path</h4>
                <p>
                  Lorem Ipsum sir dolor amet Suspendisse potenti. Nam pretium diam libero fermentum dictum
                </p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <a href="" class="btn btn-olive btn-block">Find your Path</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          @foreach ($data as $item)
        <div class="col-lg-4">
          <div class="card card-cascade narrower">
            <div class="view view-cascade narrower overlay">
              @if ($item['image'])
              <img class="card-img-top" src="{{Storage::url( $item['image']) }}" alt=""/>
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
              <p class="card-text" style="height:8rem;">
                {{$item['short_description']}}
              </p>
              <button disabled class="btn btn-outline-olive btn-sm">@if($item['all_module']) {{$item['all_module']}} Module @else 0 Module @endif</button>
              <br><br>
              <form action="{{url('class/enroll')}}" method="POST">
                @csrf
                <input type="hidden" name="id_class" value="{{$item['id']}}">
                <a href="{{url('app/detail/class/'.$item['id'])}}" class="btn btn-default">Detail</a>
                <button type="submit" class="btn btn-olive">Enroll</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
        </div>
      </div>
    </div>
    </div>
@endsection