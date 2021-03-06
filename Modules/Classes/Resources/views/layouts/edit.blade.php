@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('class-list-active','active')
@section('main-title','Class')
@section('title','Edit')
@section('page','Form')
@section('content')
@foreach ($class as $item)
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <form action="{{url('class/update/'.$item['id'])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Class Edit </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button class="btn btn-olive" id="submited" onclick="getValue()">Edit</button>
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
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programming" name="name" value="{{old('name')?old('name'):$item['name']}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Technology</label>
                                    <select class="form-control selects" data-toggle="select" id="tech" name="field_of_tech" required onchange="getPath()">
                                        <option value="" disabled selected hidden>Technology Option</option>
                                        @foreach ($tech as $items)    
                                        <option value="{{$items['id']}}"@if($items['id']==$item['field_of_tech']) selected @endif>{{$items['name']}}</option>
                                        @endforeach
                                    </select>
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
                                    <textarea id="input-description" class="form-control" placeholder="About this Class" name="short_description" type="text" enctype="multipart/form-data">
                                        {{old('short_description')?old('short_description'):$item['short_description']}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Long Description</label>
                                    <div id="editor"></div>
                                    <input type="hidden" name="long_description" id="long_description">
                                    <div class="invalid-feedback">
                                        Please insert text for this module.
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
                            <img src="{{ Storage::url( $item['image']) }}" class="rounded float-left img-thumbnail" style='width:300px' alt="...">
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
    <div class="col-xl-4 order-xl-1">
        <div class="card">
            <div class="card-header">
                <h3>Module list</h3>
            </div>
            <div class="card-body custom-height">
                <div class="scrollbar-inner">
                @if (!$item['module_lists'])
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
@section('custom-script')
<script>
	function getPath(){
			var selectPath = $('#id_learning_path')
			console.log(selectPath)
			selectPath.empty();
			selectPath.append('<option value="" selected hidden>Learning Path</option>')
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
<script>
    var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
 
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['clean']                                         // remove formatting button
];

const editor = document.getElementById('editor');

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

editor.firstChild.innerHTML =  {!! json_encode($class[0]['long_description']) !!}

function getValue(){
    var text_material = quill.root.innerHTML;
    $('#long_description').val(text_material);
    console.log(text_material);
}
</script>
@endsection