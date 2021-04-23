@extends('baseAdmin.main')
@section('learning-active','active')
@section('main-title','Learning Path')
@section('title','Form')
@section('page','Edit')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            @foreach ($path as $item)
            <form class="needs-validation" novalidate action="{{url('learningPath/update/'.$item['id'])}}" method="post">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Learning Path </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive">Edit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Path information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" value="{{old('name')?old('name'):$item['name']}}" >
                                    <div class="invalid-feedback">
                                        Please insert path name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Point</label>
                                    {{-- <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="point" value="{{old('point')?old('point'):$item['point']}}" > --}}
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing">
                                    <div class="invalid-feedback">
                                        Please insert Path point.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Path Description</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <textarea id="input-description" class="form-control" placeholder="About this Class" name="description" type="text">
                                        {{old('description')?old('description'):$item['description']}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">More</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Technology</label>
                                    <select class="form-control selects" data-toggle="select" id="tech" name="id_field_of_tech" required>
                                        <option value="" disabled selected hidden>Technology Option</option>
                                        @foreach ($tech as $items)    
                                        <option value="{{$items['id']}}"@if($items['id']==$item['id_field_of_tech']) selected @endif>{{$items['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Badge</label>
                                    <select class="form-control selects" data-toggle="select" id="badge" name="id_badge" required>
                                        <option value="" disabled selected hidden>Badge Option</option>
                                        @foreach ($badge as $items)    
                                        <option value="{{$items['id']}}"@if($items['id']==$item['id_badge']) selected @endif>{{$items['name']}}</option>
                                        @endforeach
                                    </select>
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