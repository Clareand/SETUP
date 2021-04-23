@extends('baseAdmin.main')
@section('learning-active','active')
@section('main-title','Learning Path')
@section('title','')
@section('page','Detail')
@section('content')
<div class="row">
    @foreach ($result as $item)
    <div class="col-xl-6 order-xl-1">
        <div class="card custom-height-2">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">List Class</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{url('learningPath/add/class/'.$item['id'])}}" class="btn btn-olive">Add Class</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="scrollbar-inner">
                    @if (count($item['class_paths'])!=null)
                        @foreach ($item['class_paths'] as $items)
                        <div class="card" style="background-color: #EAEAEA">
                            <div class="card-body text-darker">{{$items['class_list']['name']}}</div>
                        </div>
                        @endforeach
                    @else
                        <div class="tex-muted text-center">
                            No Data to display
                        </div>
                    @endif
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <div class="col-xl-6 order-xl-1">
        <div class="card custom-height-2">
            <div class="card-body">
                <h1 class="display-3 text-olive text-center">{{$item['name']}}</h1>
                <h5 class="text-darker text-center">{{$item['tech_field']['name']}}</h3>
                <div class="row align-items-center">
                    @if ($item['badge']['image']!="")
                    <img style='width:400px' src="" class="rounded mx-auto d-block" alt="...">
                    @else
                        <img style='width:400px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded mx-auto d-block" alt="...">
                    @endif
                </div>
                <br>  
                <div class="text-center">
                    <h2 class="text-olive ">{{$item['badge']['name']}}</h2>
                    <p class="text-muted">{{$item['badge']['point']}}</p>
                    <a href="{{url('learningPath/edit/'.$item['id'])}}" class="btn btn-olive" style="width: 20%">Edit</a> 
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection