@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('task-list-active','active')
@section('main-title','Task')
@section('title','Edit')
@section('page','Form')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
           @foreach ($result as $item)
               <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Preview Task </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('task/edit/'.$item['id'])}}" class="btn btn-olive">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="display-3">
                            {{$item['name']}}
                        </h1>
                        <br>
                        {{$item['description']}}
                    </div>
                    <br>
                    @if (count($item['task_fields'])==0)
                        No question added
                    @else
                        question list
                    @endif
                    {{-- @if ($result[0]['material_image'])
                    <img style='width:500px;height:300px' src="{{Storage::url( $item['material_image'])}}" class="rounded mx-auto d-block" alt="...">    
                    @else
                    <img style='width:500px;height:300px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded mx-auto d-block" alt="...">
                    @endif
                    <br>
                    <div id="editor">{!! html_entity_decode($item['material_text']) !!}</div> --}}
                </div>
           @endforeach
        </div>
    </div>
</div>
@endsection
