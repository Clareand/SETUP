@extends('baseAdmin.main')
@section('class-active','active')
@section('class-collapse','show')
@section('task-list-active','active')
@section('main-title','Task')
@section('title','List')
@section('page','Table')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          @include('baseAdmin.alerts')
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Task Table</h3>
            </div>
            <div class="col text-right">
              <a href="{{url ('task/create')}}" class="btn btn-olive" type="button">Add Task</a>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="name">Name</th>
                <th scope="col text-right">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @if ($status =='fail')
              <tr>
                  <td colspan="5" class="text-center">No Data to display</td>
              </tr>
              @else
              @foreach ($result as $item)
              <tr>
                <th scope="row">
                  {{($loop->iteration)+(10*($result->currentPage()-1))}}
                </th>
                <td class="title">
                  {{$item['name']}}
                </td>
                <td>
                  <div class="btn-group">
                    <a href="{{url('task/detail/'.$item['id'])}}" type="button" class="btn btn-default" data-toggle="tooltip" title="Detail">
                      <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                    </a>
                    <a href="{{url('task/edit/'.$item['id'])}}" type="button" class="btn btn-olive" data-toggle="tooltip" title="Edit">
                      <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    </a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalDelete{{$item['id']}}">
                      <span class="btn-inner--icon" data-toggle="tooltip" title="Delete"  ><i class="fas fa-trash-alt"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              {{-- modal --}}
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
                      Are you sure want to delete class <strong>{{$item['title']}}</strong> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="{{url('task/delete/'.$item['id'])}}" type="button" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              @if ($status=='success')
              {{$result->links()}}
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>
@endsection