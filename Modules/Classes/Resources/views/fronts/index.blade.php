@extends('baseStudent.main')
@section('content')
@include('baseAdmin.alerts')
    <div class="row">
      @foreach ($data as $item)
        <div class="col-lg-3">
          <div class="card card-cascade narrower">
            <div class="view view-cascade narrower overlay">
              <img class="card-img-top" src="{{url('assets/img/picture/cyan-forest.jpg')}}" alt=""/>
            </div>
            <div class="card-body card-body-cascade">
              <h5 class="pb-2 pt-1">
                {{$item['tech_field']['name']}}
              </h5>
              <h3 class="font-weight-bold card-title text-center">
                {{$item['name']}}
              </h3>
              <p class="card-text" style="height:8rem;">
                {{$item['description']}}
              </p>
              <button disabled class="btn btn-outline-olive btn-sm">hello</button>
              <br><br>
              <form action="{{url('class/enroll')}}" method="POST">
                @csrf
                <input type="hidden" name="id_class" value="{{$item['id']}}">
                <button type="submit" class="btn btn-olive">Enroll</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection