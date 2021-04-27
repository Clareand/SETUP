@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('class-list-active','active')
@section('main-title','Class')
@section('title','Add')
@section('page','Form')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <form class="needs-validation" novalidate action="{{url('class/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Class </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive">Save</button>
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
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" required>
                                    <div class="invalid-feedback">
                                        Please insert class name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Technology</label>
                                    <select class="form-control selects" data-toggle="select" id="tech" name="field_of_tech" required onchange="getPath()">
                                        <option value="" disabled selected hidden>Technology Option</option>
                                        @foreach ($result as $item)    
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
                    <h6 class="heading-small text-muted mb-4">Class description</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <input id="input-address" class="form-control" placeholder="About this Class" name="description" type="text" required>
                                    <div class="invalid-feedback">
                                        Please insert description about this class.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Class Image</h6>
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
                                    <label class="form-control-label" for="input-username">Upload new Image</label>
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
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
	function getPath(){
			var selectPath = $('#id_learning_path')
			console.log(selectPath)
			selectPath.empty();
			selectPath.append('<option value="" disabled selected hidden>Learning Path</option>')
			let old_tech = document.getElementById("tech").value;
			var token = "{{csrf_token()}}";
			console.log("tech",old_tech)
			console.log(token)
			$.ajax({
					type:'POST',
					url:"<?php echo url('path')?>",
					data:"_token="+token+"&id_field_of_tech="+old_tech,
					success:function(data){
							console.log(data['result'])
									for(var i=0; i<data['result'].length;i++){
											selectPath.append('<option value=" '+data['result'][i]['id']+'">'+data['result'][i]['name']+'</option>')
									}
					},
					error:function(data,textStatus,errorThrown){
							console.log(data)
					}
			});
	}
</script>
@endsection