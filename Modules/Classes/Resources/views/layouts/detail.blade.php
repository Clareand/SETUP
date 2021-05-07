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
                                    <label class="form-control-label" for="input-address">Short Description</label>
                                    <textarea name="short_description" class="form-control" rows='5' readonly>
                                        {{$item['short_description']}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Long Description</label>
                                    <div id="editor">{!! html_entity_decode($item['long_description']) !!}</div>
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
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Module List </h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{url('class/add/module/'.$item['id'])}}" class="btn btn-olive">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body custom-height">
                <div class="scrollbar-inner">
                    @if (count($item['module_lists'])==0)
                    <strong>No Module to display</strong>
                @else
                @foreach ($item['module_lists'] as $items)
                    <div class="card bg-light">
                        <div class="card-body" style="background-color: #e9e8e8">
                           <div class="row">
                               <div class="col-md-2">
                                   {{$items['step']}}
                               </div>
                               <div class="col-md-7">
                                @if ($items['type']=='task')
                                    {{$items['task']['name']}}
                                @else
                                    {{$items['material']['title']}}
                                @endif
                               </div>
                               <div class="col-md-3">
                                @if ($items['type']=='task')
                                    <span class="badge badge-md badge-warning">{{$items['type']}}</span>
                                @else
                                    <span class="badge badge-md badge-success">{{$items['type']}}</span>
                                @endif
                               </div>
                           </div>
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection