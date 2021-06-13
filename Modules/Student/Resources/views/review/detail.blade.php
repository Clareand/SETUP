@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('review-active','active')
@section('main-title','Student')
@section('title','Detail')
@section('page','Task')
@section('content')
<div class="row">
    <div class=" col-xl-8 order-xl-1">
        <div class="card">
            <form>
                @csrf
                <div class="card-header">
                    @include('baseAdmin.alerts')
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Task </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('student/review/edit/'.$result[0]['id'])}}" type="submit" class="btn btn-olive">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($result as $task)
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Task Name</label>
                                            <input disabled type="text" id="input-username" class="form-control" placeholder="Full Name" name="name" value="{{old('name')?old('name'):$task['task']['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Student Name</label>
                                            <input readonly type="text" class="form-control" value="{{old('name')?old('name'):$task['user']['name']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Point</label>
                                            <input type="text" id="input-first-name" class="form-control" placeholder="point" name="point"  value="{{old('point')?old('point'):$task['point']}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            {{-- Address --}}
                            <h6 class=" heading-small text-muted mb-4">Task</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <h2> Task Field :{{$task['task_field']['field_question']}}</h2>
                                        </div>
                                    </div>
                                   <div class="col-lg-3">
                                    <div class="text-right">Status : 
                                        @if ($task['status']==1)
                                            Accepted
                                        @elseif($task['status']==2)
                                            Denied
                                        @elseif($task['status']==3)
                                            Pending
                                        @endif
                                    </div>
                                   </div>
                                    <div class="col-md-12">
                                        <p class="text-lg"><strong>Answer:</strong></p>
                                        @if (pathinfo($task['answer_upload'], PATHINFO_EXTENSION) == 'txt')
                                            <div>
                                                {{ Storage::get($task['answer_upload']) }}
                                            </div>
                                        @else
                                            <img src="{{ Storage::url( $task['answer_upload']) }}" class="rounded float-left img-thumbnail" alt="...">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection