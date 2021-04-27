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
                <div class="card-body">
                    @if (count($item['task_fields'])==0)
                        No question added
                    @else
                        question list
                    @endif
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
