@extends('baseAdmin.main')
@section('master-data-active','active')
@section('data-collapse','show')
@section('badge-active','active')
@section('main-title','badge')
@section('title','Form')
@section('page','Edit')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            @foreach ($result as $item)
            <form class="needs-validation" novalidate action="{{url('badge/update/'.$item['id'])}}" method="post">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Badge </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive">Edit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Badge information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" value="{{old('name')?old('name'):$item['name']}}" >
                                    <div class="invalid-feedback">
                                        Please insert class name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Point</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="point" value="{{old('point')?old('point'):$item['point']}}" >
                                    <div class="invalid-feedback">
                                        Please insert class name.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Badge Image</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            @if ($item['image'])
                            <img src="" class="rounded float-left img-thumbnail" alt="...">
                            @else
                            <img style='width:300px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                            @endif
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Badge Image</label>
                                    <input type="file" id="input-username" class="form-control" placeholder="Basic programing" name="image">
                                    {{-- <div class="invalid-feedback">
                                        Please insert class name.
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection