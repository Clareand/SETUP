@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('admin-active','active')
@section('main-title','Admin')
@section('title','List')
@section('page','Table')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Admin Table</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-olive" type="button">Add Admin</button>
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
                <th scope="col" class="sort" data-sort="email">Email</th>
                <th scope="col">Phone</th>
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
                  {{$item['user']['name']}}
                </td>
                <td>
                  {{$item['user']['email']}}
                </td>
                <td>
                  {{$item['user']['phone']}}
                </td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default">
                      <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                    </button>
                    <button type="button" class="btn btn-olive">
                      <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    </button>
                    <button type="button" class="btn btn-default">
                      <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                    </button>
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