@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('task-list-active','active')
@section('main-title','Task')
@section('title','Create')
@section('page','Form')
@section('content')
<div class="row">
    <div class="col-xl-6 order-xl-1">
        <div class="card">
            <form class="needs-validation" novalidate action="{{url('question/store/'.$id)}}" method="post" id="forms" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Question Field </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive" id="submited">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Question Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Question</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="field_question" required>
                                    <div class="invalid-feedback">
                                        Please insert material title.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Type</label>
                                    <select class="form-control selects" data-toggle="select" id="field" name="field_type" onchange="getField()" required>
                                        <option value="" disabled selected hidden>Field type</option>
                                        <option value="short answer">Short Answer</option>
                                        <option value="multiple">Multiplechoice Answer</option>
                                        <option value="file upload">File Upload</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Choose field type
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Point</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Question Point" name="point" required>
                                    <div class="invalid-feedback">
                                        Please insert material title.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div id='fields'></div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-6 order-xl-1">
        @foreach ($result  as $item)
        <div class="card">
            <form class="needs-validation" novalidate action="" id="forms" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Question Field </h3>
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
                                       <div class="row">
                                           <div class="col-md-9">
                                                @foreach ($field['task_field_options'] as $task)
                                                Answer: {{$task['option_value']}}
                                                @endforeach
                                           </div>
                                           <div class="col-md-3 text-right">
                                                <button href="" class="btn btn-sm btn-default" data-toggle="modal" type="button" data-target="#modalDelete{{$field['id']}}">
                                                    <span><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                                <a class="btn btn-sm btn-warning" href="{{url('question/edit/'.$item['id'].'/'.$field['id'])}}">
                                                    <span><i class="fas fa-pen-alt"></i></span>
                                                </a>
                                           </div>
                                       </div>
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
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h5 class="text-gray">{{$field['field_type']}}</h5>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <button href="" class="btn btn-sm btn-default" data-toggle="modal" type="button" data-target="#modalDelete{{$field['id']}}">
                                                    <span><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                                <a class="btn btn-sm btn-warning" href="{{url('question/edit/'.$item['id'].'/'.$field['id'])}}">
                                                    <span><i class="fas fa-pen-alt"></i></span>
                                                </a>
                                            </div>
                                        </div>
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
                                            <div class="col-md-9">
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
                                            <div class="col-md-3 text-right">
                                                <button class="btn btn-sm btn-default" data-toggle="modal" type="button" data-target="#modalDelete{{$field['id']}}">
                                                    <span><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                                <a class="btn btn-sm btn-warning" href="{{url('question/edit/'.$item['id'].'/'.$field['id'])}}">
                                                    <span><i class="fas fa-pen-alt"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endif
                                <div class="modal fade"  id="modalDelete{{$field['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure want to delete task <strong>{{$field['field_question']}}</strong> ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{url('question/delete/'.$field['id'])}}" type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('custom-script')
    <script>
        function getField(){
            let fields = $('#fields')
            fields.empty()
            let idField = document.getElementById('field').value;
            console.log(idField)
            if(idField=='short answer'){
                fields.append(
                    `<h6 class="heading-small text-muted mb-4">Question Fields</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Answer</label>
                                    <input class="form-control" name="option_value" id="material_text" required>
                                    <div class="invalid-feedback">
                                        Please insert text for this module.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                )
            }

            if(idField=='multiple'){
                fields.append(
                    `<h6 class="heading-small text-muted mb-4">Question for multiplechoice Fields</h6>
                    <div class="pl-lg-4">
                        @for ($i = 1; $i < 5; $i++)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Field {{$i}}</label>
                                    <input class="form-control" name="option_text_{{$i}}" id="material_text" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please insert text for this module.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="custom-toogle" for="input-address">Answer</label>
                                    <select class="form-control selects" data-toggle="select" id="{{$i}}" name="option_value_{{$i}}" required>
                                        <option value="" disabled selected hidden>True/False</option>
                                        <option value="true">True</option>
                                        <option value="false">False</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please insert text for this module.
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>`
                )
                $('.selects').select2();
            }

            if(idField=='file upload'){
                fields.append(
                    `<input hidden name="option_value" value="true">`
                )
            }
        }
    </script>
@endsection
