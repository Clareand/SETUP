@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('class-list-active','active')
@section('main-title','Class')
@section('title','Detail')
@section('content')
@foreach ($result as $item)
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <form>
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Class Detail </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('class/edit/'.$item['id'])}}" class="btn btn-olive">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Class information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programming" name="name" value="{{old('name')?old('name'):$item['name']}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Technology</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="field_of_tech" value="{{old('field_of_tech')?old('field_of_tech'):$item['tech_field']['name']}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Class description</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <input id="input-address" class="form-control" placeholder="About this Class" name="description" type="text" value="{{old('description')?old('description'):$item['description']}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Class Image</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            @if ($item['image'])
                            <img src="{{ Storage::url( $item['image']) }}" class="rounded float-left img-thumbnail" style='width:300px' alt="...">
                            @else
                            <img style='width:300px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                            @endif
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-4 order-xl-1">
        <div class="card">
            <div class="card-header">
                <h3>Module list</h3>
            </div>
            <div class="card-body custom-height">
                <div class="scrollbar-inner">
                    @if (!$item['module_list'])
                    <strong>No Module to display</strong>
                @else
                    <div class="card bg-light">
                        <div class="card-body">
                            test
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection