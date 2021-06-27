@extends('baseAdmin.main')
@section('learning-active','active')
@section('main-title','Badge')
@section('title','Form')
@section('page','Create')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <form class="needs-validation" novalidate action="{{url('learningPath/store')}}" method="post">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Path </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Path Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" required>
                                    <div class="invalid-feedback">
                                        Please insert Path name.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Technology</label>
                                    <select class="form-control selects" data-toggle="select" id="tech" name="id_field_of_tech" required>
                                        <option value="" disabled selected hidden>Technology Option</option>
                                        @foreach ($tech as $item)    
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Choose one.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Badge</label>
                                    <select class="form-control selects" data-toggle="select" id="badge" name="id_badge" required>
                                        <option value="" disabled selected hidden>Bagde</option>
                                        @foreach ($badge as $item)    
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
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Path description</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <textarea id="input-address" class="form-control" placeholder="About this Path" name="description" required></textarea>
                                    <div class="invalid-feedback">
                                        Please insert description about this Path.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection