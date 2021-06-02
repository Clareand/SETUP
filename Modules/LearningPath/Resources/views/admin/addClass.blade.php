@extends('baseAdmin.main')
@section('learning-active','active')
@section('main-title','Learning Path')
@section('title','Class')
@section('page','Add')
@section('content')
    <div class="row">
        <div class="col-xl-6 order-xl-1">
            <div class="card custom-height">
                <form action="{{url('learningPath/store/class/'.$id)}}" method="post">
                    @csrf
                    <div class="card-header">
                        @include('baseAdmin.alerts')
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add Class to Learning Path </h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-olive">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Class List</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Step</label>
                                        <input class="form-control" placeholder="Step" name="step" type="number" required>
                                        <input type="hidden" name="id_learning_path" value="{{$id}}">
                                        <div class="invalid-feedback">
                                            Please Insert step of path
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Class</label>
                                        <select class="form-control selects" data-toggle="select" id="tech" name="id_class" required onchange="getPath()">
                                            <option value="" disabled selected hidden>Class Option</option>
                                            @foreach ($class as $item)    
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Choose one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 order-xl-1">
            <div class="card custom-height">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Class Added </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="scrollbar-inner">
                        @foreach ($path as $item)
                        <div class="card" style="background-color: #EAEAEA">
                            <div class="card-body text-darker">
                                <div class="row">
                                    <div class="col-md-1">
                                        {{$item['step']}}
                                    </div>
                                    <div class="col-md-8">{{$item['class_list']['name']}}</div>
                                    <div class="col-md-3 text-right">
                                        <a href="{{url('learningPath/delete/class/'.$item['id'])}}" class="btn btn-sm btn-default">
                                            <span><i class="fas fa-trash-alt"></i></span>
                                        </a>
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