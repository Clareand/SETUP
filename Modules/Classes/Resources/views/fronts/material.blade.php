@extends('baseStudent.main')
@section('content')
<div class="row">
    @foreach ($module as $item)
    <div class="col-lg-4 order-2">
        <div class="row">
            <div class="col-lg-10">
                <div class="card bg-lighter">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-6 text-lg">Progress</div>
                           <div class="col-md-6 text-lg text-right text-bold">{{count($counts)}}/{{count($user)}}</div>
                           {{-- {{$total}} --}}
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
               <h1 class="display-4" style="font-weight: 400 !important">Material List</h1>
            </div>
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $items)
                                    <tr>
                                        @if ($items['type']=='material')
                                        <th>{{$items['material']['title']}}</th>
                                        @else
                                        <th>{{$items['task']['name']}}</th>
                                        @endif
                                        <th>
                                            @if ($items['id']==$user[$loop->iteration-1]['id_module'])
                                                @if ($user[$loop->iteration-1]['status']==1)
                                                    <h3 class="text-right">Done</h3>
                                                @endif
                                            @endif
                                        </th>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>
   <div class="col-lg-8 order-2">
       @if ($item['type']=='material')
           {{-- material --}}
            <div class="row">
                <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="display-3">
                        {{$item['material']['title']}}
                    </h1>
                </div>
                <div id="editor">{!! html_entity_decode($item['material']['material_text']) !!}</div>
                </div>
            </div>
           {{-- /material --}}
       @else
           {{-- task --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="display-3">
                            {{$item['task']['name']}}
                        </h1>
                    </div>
                <br>
                    <div class="less">
                        <p>Lorem Nunc orci mi, ultricies ut efficitur eget, lobortis id nunc. Etiam scelerisque vehicula vehicula. 
                            Quisque nec ultricies ligula, sit amet consequat leo. Donec quis malesuada lectus, eget molestie augue. 
                            Ut efficitur in arcu in rutrum. Curabitur purus ante, viverra quis mi quis, euismod dapibus dolor. 
                            Duis vulputate ligula eros, non semper dolor malesuada id. Pellentesque faucibus augue nec molestie rutrum. 
                            Cras dignissim porta felis, et pulvinar lectus ornare vitae. Aenean euismod hendrerit lorem, eu posuere ante 
                            imperdiet sed. Ut sapien nunc, facilisis nec nulla a, ultricies placerat velit. Fusce vulputate nisl nisl, 
                            euismod leo convallis eu. Nam varius diam vel arcu varius :
                        </p>
                        <br>
                        <form action="{{url('app/check/task/'.$item['id_task'])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_task" value="{{$item['id_task']}}">
                        @foreach ($item['task']['task_fields'] as $items)
                            <h2>{{$loop->iteration}}. {{$items['field_question']}}</h2>
                            @if ($items['field_type']=='multiple')
                            <div class="row">
                                @foreach ($items['task_field_options'] as $opt)
                                <div class="col-md-3">
                                    <div class="form-group custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline{{$opt['id']}}" name="multiple_answer{{$items['id']}}" class="custom-control-input" value="{{$opt['id']}}">
                                        <label class="custom-control-label" for="customRadioInline{{$opt['id']}}">{{$opt['option_text']}}</label>
                                    </div>
                                </div>
                                @endforeach 
                            </div> 
                            <br>
                        @elseif($items['field_type']=='short answer')
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Answer</label>
                                        <input type="text" class="form-control" placeholder="..." name="short_answer{{$items['id']}}" required>
                                        <div class="invalid-feedback">
                                            Please insert the Answer.
                                        </div>
                                    </div>
                                </div>	
                            </div>
                            <br>
                        @else
                            <input type="hidden" name="file{{$items['id']}}">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Upload file</label>
                                        <input type="file" id="input-username" class="form-control" placeholder="Basic programing" name="upload">
                                        {{-- <div class="invalid-feedback">
                                            Please insert class name.
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <br>
                        @endforeach
                        <br>
                        <button type="submit" class="btn btn-olive btn-small text-right">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
           {{-- task --}}
       @endif
       <br>
       <br>
       @if ($item['type']=='material')
       <div class="row">
            <div class="col-lg-6">
                @if ($item['step']==1)
                <a class="btn btn-outline-olive btn-lg disabled" style="width: 200px">Previous</a>
                @else
                <a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['id']-1))}}" class="btn btn-outline-olive btn-lg" style="width: 200px">Previous</a>
                @endif
            </div>
            <div class="col-lg-6 text-right">
                @if ($item['step']==count($list))
                <a class="btn btn-olive btn-lg disabled" style="width: 150px">Next</a>
                @else
                <button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}})">Next</button>
                @endif
            </div>
        </div>
       @else
       <div class="row">
            <div class="col-lg-6">
                @if ($item['step']==1)
                <a class="btn btn-outline-olive btn-lg disabled" style="width: 200px">Previous</a>
                @else
                <a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['id']-1))}}" class="btn btn-outline-olive btn-lg" style="width: 200px">Previous</a>
                @endif
            </div>
            <div class="col-lg-6 text-right">
                @if ($item['status']==0)
                <button type="button" class="btn btn-olive btn-lg disabled" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}})">Next</button>
                @else
                @if ($item['step']==count($list))
                <a class="btn btn-olive btn-lg disabled" style="width: 150px">Next</a>
                @else
                <button type="button" class="btn btn-olive btn-lg" style="width: 150px" onclick="getChecked({{$item['id']}},{{$item['id_class']}})">Next</button>
                @endif
                @endif
            </div>
        </div>
       @endif
   </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalFailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Sorry, Something went Wrong.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-olive" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Congratulation, You got Point!
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline btn-olive" data-dismiss="modal">Close</button>
            <a href="{{url('app/class/material/'.$item['id_class'].'/'.'tutorials/'.($item['id']+1))}}" class="btn btn-olive">Next</a>
            </div>
        </div>
        </div>
    </div>
    @endforeach
</div>    
@endsection

@section('custom-script')
    <script>
        function getChecked($id,$class){
            var token = "{{csrf_token()}}";
            console.log($id);
            $.ajax({
					type:'POST',
					url:"<?php echo url('app/check/status')?>",
					data:"_token="+token+"&id="+$id+"&class="+$class,
					success:function(data){
						console.log(data)
                        if(data=='true'){
                            console.log('ok')
                            $('#ModalSuccess').modal('show');
                        }else if(data=='done'){
                            const url = "{{URL::to('app/class/material')}}"+"/"+$class+"/"+"tutorials"+"/"+($id+1);
                            window.location.href = url
                            console.log(url);
                        }else{
                            console.log('fail')
                            $('#ModalFailed').modal('show');
                        }
					},
					error:function(data,textStatus,errorThrown){
						console.log(data)
					}
			});
        }
    </script>
@endsection