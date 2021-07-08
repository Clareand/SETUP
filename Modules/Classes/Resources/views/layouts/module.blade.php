@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('class-list-active','active')
@section('main-title','')
@section('title','Class')
@section('page','Add Module')
@section('content')
    <div class="row">
        <div class="col-xl-6 order-xl-1">
            <div class="card custom-height">
                <form action="{{url('class/store/module/'.$id)}}" method="post">
                    @csrf
                    <div class="card-header">
                        @include('baseAdmin.alerts')
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add New Module</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-olive">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Step</label>
                                        <input type="hidden" name="id_class" value="{{$id}}">
                                        <input class="form-control" placeholder="Step" name="step" type="number" required>
                                        {{-- <input type="hidden" name="id_learning_path" value="{{$id}}"> --}}
                                        <div class="invalid-feedback">
                                            Please Insert step of path
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Type</label>
                                        <select class="form-control selects" data-toggle="select" id="type" name="type" required onchange="getType()">
                                            <option value="" disabled selected hidden>Field type</option>
                                            <option value="material">Module</option>
                                            <option value="task">Task</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Choose one.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="options">
                                
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
                            <h3 class="mb-0">Module Added </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="scrollbar-inner">
                        @foreach ($list as $item)
                        <div class="card" style="background-color: #EAEAEA">
                            <div class="card-body text-darker">
                                <div class="row">
                                    <div class="col-md-1">
                                        {{$item['step']}}
                                    </div>
                                    @if ($item['type']=='task')
                                    <div class="col-md-8">{{$item['task']['name']}}</div>
                                    @else
                                    <div class="col-md-8">{{$item['material']['title']}}</div>
                                    @endif
                                    <div class="col-md-3 text-right">
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalDelete{{$item['id']}}">
                                            <span><i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade"  id="modalDelete{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Are you sure want to delete module
                                  @if ($item['type']=='task')
                                    <strong>{{$item['task']['name']}}</strong>
                                  @else
                                    <strong>{{$item['material']['title']}}</strong>
                                  @endif
                                  ?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="{{url('class/delete/module/'.$item['id'])}}" type="button" class="btn btn-danger">Delete</a>
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

@section('custom-script')
    <script>
        function getType(){
            let types = $('#options')
            types.empty()
            let idType = document.getElementById('type').value;
            console.log(idType)
            if(idType=='material'){
                types.append(
                    `<div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Class</label>
                            <select class="form-control selects" data-toggle="select" id="tech" name="id_material" required>
                                <option value="" disabled selected hidden>Module Option</option>
                                @foreach ($material as $item)    
                                <option value="{{$item['id']}}">{{$item['title']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Choose one.
                            </div>
                        </div>
                    </div>`
                )
            }else if(idType=='task'){
                types.append(
                    `<div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Task</label>
                            <select class="form-control selects" data-toggle="select" id="tech" name="id_task" required>
                                <option value="" disabled selected hidden>Task Option</option>
                                @foreach ($task as $item)    
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Choose one.
                            </div>
                        </div>
                    </div>`
                )
            }
            $('.selects').select2();
        }
    </script>
@endsection