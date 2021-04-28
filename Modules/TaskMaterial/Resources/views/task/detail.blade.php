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
                <div class="card-body custom-height-2">
                    <div class="text-center">
                        <h1 class="display-2 text-olive">
                            {{$item['name']}}
                        </h1>
                        {{$item['description']}}
                    </div>
                    <br>
                    <div class="scrollbar-inner">
                        <div class="card">
                            @foreach ($item['task_fields'] as $field)
                                @if ($field['field_type']=='short answer')
                                    <div class="card-header" style="background-color: #fafafa">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>{{$field['field_question']}}</h2>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h4 class="text-olive">{{$field['point']}} Points</h4>
                                            </div>
                                        </div>
                                        <h5 class="text-gray">{{$field['field_type']}}</h5>
                                    </div>
                                    <div class="card-body" style="background-color: #fafafa">
                                        @foreach ($field['task_field_options'] as $task)
                                        Answer: {{$task['option_value']}}
                                        @endforeach
                                    </div>
                                    <br>
                                @elseif($field['field_type']=='file upload')
                                    <div class="card-header" style="background-color: #fafafa">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>{{$field['field_question']}}</h2>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h4 class="text-olive">{{$field['point']}} Points</h4>
                                            </div>
                                        </div>
                                        <h5 class="text-gray">{{$field['field_type']}}</h5>
                                    </div>
                                    <br>
                                @else
                                    <div class="card-header" style="background-color: #fafafa">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>{{$field['field_question']}}</h2>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h4 class="text-olive">{{$field['point']}} Points</h4>
                                            </div>
                                        </div>
                                        <h5 class="text-gray">{{$field['field_type']}}</h5>
                                    </div>
                                    <div class="card-body" style="background-color: #fafafa">
                                        <div class="row">
                                            @foreach ($field['task_field_options'] as $task)
                                                <div class="col-lg-12">
                                                    @if ($task['option_value']=='true')
                                                        <div class="text-teal">
                                                            {{$loop->iteration}}. {{$task['option_text']}} (Answer)
                                                        </div>
                                                    @else
                                                        <div>
                                                            {{$loop->iteration}}. {{$task['option_text']}}
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                @endif
                            @endforeach
                            <br><br><br>
                            
                        </div>
                    </div>
                </div>
                <br><br>
           @endforeach
        </div>
    </div>
</div>
@endsection
