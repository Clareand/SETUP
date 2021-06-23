@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
      <div class="row">
          @foreach ($result as $item)    
          <div class="col-lg-3 col-md-2">
              <div class="bg-light" style="width: 300px;height:300px;border-radius: 20px;margin-top:-7rem;">
                @if ($item['badge']['image'])
                <img src="{{ Storage::url( $item['badge']['image']) }}" class="rounded square-2 img-thumbnail" alt="..." style='object-fit: cover;'/>
                @else
                <img style='width:300px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                @endif
              </div>
          </div>
          <div class="col-lg-7 col-md-10 text-center" style="margin-top: 5vh">
            <h1 class="display-2 text-white">{{$item['name']}}</h1>
            <p class="text-white mt-0 mb-5">{{$item['description']}}</p>
          </div>
          @endforeach
      </div>
    </div>
  </div>
@endsection
@section('content')
@include('baseAdmin.alerts')
@foreach ($result as $item)
<div class="row">
    <div class="col-xl-12">
        <div class="row margin-1">
            <div class="col-lg-12 top-2 text-center">
             <h1 class="display-3">
                 Class List
             </h1>
             <h6 class="lead">in {{$item['name']}}</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($item['class_paths'] as $items)    
    <div class="col-lg-12">
        <div class="card" style="padding: 2rem">
            <div class="row">
                <div class="col-md-12 text-right ">
                    <div class=" text-small">{{$items['step']}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="bg-light" style="width: 200px;height:200px; border-radius:10px">
                    @if ($items['class_list']['image'])
                    <img src="{{ Storage::url( $items['class_list']['image']) }}" class="rounded square-1 img-thumbnail" alt="..." style='object-fit: cover;'/>
                    @else
                    <img src="{{url('assets/img/picture/not-found.png')}}" class="rounded square-1 float-left img-thumbnail" alt="...">
                    @endif
                    </div>
                </div>
                <div class="col-lg-10 text-left">
                    <br>
                    <h4 class="text-olive">{{$items['class_list']['name']}}</h4> <button disabled class="btn btn-outline-olive btn-sm">{{$items['class_list']['all_module']}} Module</button>
                    <p>{{$items['class_list']['short_description']}}</p>
                    <form action="{{url('app/class/enroll')}}" method="post">
                    <a href="{{url('app/detail/class/'.$items['class_list']['id'])}}" class="btn btn-default">Detail</a>
                    @csrf
                    <input type="hidden" name="id_class" value="{{$items['class_list']['id']}}">
                    @php
                        $i=0;
                        $values=null;
                    @endphp
                    @if (isset($user))
                        @foreach ($user as $users)
                            @if ($users['id_class']==$items['id_class'])
                                @php
                                    $i=$i+1;
                                    $values = $users['progress'];
                                @endphp
                            @endif
                        @endforeach
                        @if ($i==1)
                        <a href="{{url('app/detail/class/'.$items['class_list']['id'])}}" class="btn btn-olive">Learn</a><br><br>
                        Progress: <span>{{$values}} %</span>
                        @php
                            $i=0;
                            $values=null;
                        @endphp
                        @else
                        <button type="submit" class="btn btn-olive">Enroll</button>
                        @endif
                        {{-- <button type="submit" class="btn btn-olive">Enroll</button> --}}
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
@endsection