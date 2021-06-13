@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('review-active','active')
@section('main-title','Review Task')
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
              <h3 class="mb-0">Student Table</h3>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="name">Task</th>
                <th scope="col" class="sort" data-sort="name">User Name</th>
                <th scope="col" class="sort" data-sort="email">Status</th>
                <th scope="col">Point</th>
                <th scope="col text-right">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($data as $item)
              <tr>
                <th scope="row">
                  {{$loop->iteration+(10*($current_page-1))}}
                </th>
                <td class="name">
                  {{$item['task']['name']}}
                </td>
                <td>
                  {{$item['user']['name']}}
                </td>
                <td>
                  @if ($item['status']=='3')
                    <span class="badge badge-pill badge-warning badge-lg">Pending</span>
                  @elseif($item['status']=='2')
                    <span class="badge badge-pill badge-danger badge-lg">Denied</span>
                  @elseif  ($item['status']=='1') 
                    <span class="badge badge-pill badge-default badge-lg">Accepted</span>
                  @endif
                </td>
                <td>
                  {{$item['point']}}
                </td>
                <td>
                  <div class="btn-group">
                    <a href="{{url('student/review/detail/'.$item['id'])}}" type="button" class="btn btn-default" data-toggle="tooltip" title="Detail">
                      <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                    </a>
                    <a href="{{url('student/review/edit/'.$item['id'])}}" type="button" class="btn btn-olive" data-toggle="tooltip" title="Edit">
                      <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item active olive">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>
@endsection