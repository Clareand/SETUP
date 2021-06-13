@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Leaderboard</h1>
          <p class="text-white mt-0 mb-5">
              This is leaderboard page. 
              You can see the point from 
              you've made and anyone else
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="display-4 text-center">Leaderboard</h1>
                </div>
                <div class="card-body custom-height">
                    <div class="scrollbar-inner">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="rank">Rank</th>
                                        <th scope="col" class="sort" data-sort="name">Name</th>
                                        <th scope="col" class="sort" data-sort="name">Badge</th>
                                        <th scope="col" class="sort" data-sort="name">Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rank as $item)
                                    @if ($item['user']['id']==Auth::user()->id)
                                    <tr style="background-color: #e4e4e4">
                                        <th scope="row">
                                            {{$loop->iteration}}
                                        </th>
                                        <td>{{$item['user']['name']}}</td>
                                        <td>
                                            @if ($item['user']['badges'])
                                                {{count($item['user']['badges'])}}
                                            @else 
                                                0
                                            @endif
                                        </td>
                                        <td>{{$item['point']}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <th scope="row">
                                            {{$loop->iteration}}
                                        </th>
                                        <td>{{$item['user']['name']}}</td>
                                        <td>
                                            @if ($item['user']['badges'])
                                                {{count($item['user']['badges'])}}
                                            @else 
                                                0
                                            @endif
                                        </td>
                                        <td>{{$item['point']}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h4 class="text-center">Your Rank : {{$userRank}}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection