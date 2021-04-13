@extends('baseAdmin.main')
@section('master-data-active','active')
@section('data-collapse','show')
@section('tech-active','active')
@section('main-title','Tech Field')
@section('title','Form')
@section('page','Create')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            @foreach ($result as $item)
            <div class="card-header">
                @include('baseAdmin.alerts')
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Add New Field </h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{url('tech/edit/'.$item['id'])}}" class="btn btn-olive">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Tech information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" value="{{old('name')?old('name'):$item['name']}}" readonly disabled>
                                <div class="invalid-feedback">
                                    Please insert class name.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection