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
  {{-- @foreach ($result as $item)     --}}
  <div class="col-xl-4 order-xl-2">
      <div class="row">

      </div>
  </div>
  <div class=" col-xl-8 order-xl-1">
      <div class="row">

      </div>
  </div>
  {{-- @endforeach --}}
  </div>
@endsection