@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('task-list-active','active')
@section('main-title','Material')
@section('title','Form')
@section('page','Editor')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        @foreach ($result as $item)
        <div class="card">
            <form class="needs-validation" novalidate action="" id="forms" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Question Field </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('question/create/'.$item['id'])}}" type="submit" class="btn btn-olive" id="submited">Add New Field</a>
                        </div>
                    </div>
                </div>
                <div class="card-body custom-height-2">
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-4 order-xl-1">
        <div class="card">
            <form class="needs-validation" novalidate action="{{url('task/update/'.$result[0]['id'])}}" method="post" id="forms" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Task </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive" id="submited" onclick="getValue()">Edit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Task Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Task Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" value="{{old('name')?old('name'):$item['name']}}" required>
                                    <div class="invalid-feedback">
                                        Please insert task name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <textarea class="form-control" placeholder="Description about this Task" name="description" required>
                                        {{$item['description']}}
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Please insert text for this Task.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection
