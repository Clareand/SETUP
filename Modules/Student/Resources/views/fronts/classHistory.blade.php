@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello Stjärna</h1>
          <p class="text-white mt-0 mb-5">This is your History Page of classes and path you've taken. You can see the progress you've made with your class here</p>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
<div class="row">
  <div class="col-xl-5 order-xl-2">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
            <div class="col-12">
                <h1 class="mb-0 text-center">Path</h1>
            </div>
        </div>
      </div>
      <div class="card-body custom-height">
        <div class="scrollbar-inner">
          @foreach ($path as $item)
              <div class="card">
                <div class="card-body" style="background-color: #e9e8e8;border-radius:10px">
                  <div class="row">
                    <div class="col-lg-3">
                      @if ($item['badge']['image'])
                      <img src="{{ Storage::url( $item['badge']['image']) }}" class="rounded float-left img-thumbnail square-2" alt="..." style='object-fit:cover/'>
                      @else
                      <img style="width:100px" src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                      @endif
                    </div>
                    <div class="col-lg-9">
                      <p class="text-md" style="font-weight: 500;padding-top:2rem">{{$item['name']}}</p>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class=" col-xl-7 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
              <div class="col-12">
                  <h1 class="mb-0 text-center">Class</h1>
              </div>
          </div>
      </div>
      <div class="card-body custom-height">
        <div class="scrollbar-inner">
          @foreach ($class as $item)  
          <div class="card">
            <div class="card-body" style="background-color: #e9e8e8;border-radius:10px">
              <div class="row">
                <div class="col-lg-8">
                  <strong>{{$item['class_list']['name']}}</strong>
                </div>
                <div class="col-lg-4 text-right">
                  {{$item['progress']}}%
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      </div>
  </div>
  </div>
@endsection