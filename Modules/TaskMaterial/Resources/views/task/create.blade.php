@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('task-list-active','active')
@section('main-title','Task')
@section('title','Create')
@section('page','Form')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <form class="needs-validation" novalidate action="{{url('task/store')}}" method="post" id="forms" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add New Task </h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-olive" id="submited" onclick="getValue()">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Task Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Basic programing" name="name" required>
                                    <div class="invalid-feedback">
                                        Please insert material title.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Task Description</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Description</label>
                                    <textarea id="input-address" class="form-control" placeholder="Description about this Task" name="description" required></textarea>
                                    <div class="invalid-feedback">
                                        Please insert text for this Task.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Material Image</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Upload Image</label>
                                    <input type="file" id="input-username" class="form-control" placeholder="Basic programing" name="image">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
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

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

function getValue(){
    var text_material = quill.root.innerHTML;
    $('#material_text').val(text_material);
    console.log(text_material);
}
</script>
@endsection