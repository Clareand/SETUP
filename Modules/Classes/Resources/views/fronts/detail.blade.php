@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
    @foreach ($result as $item)    
      <div class="row">
          <div class="col-lg-3 col-md-2">
              <div class="bg-light" style="width: 300px;height:300px;border-radius: 20px;margin-top:-7rem;">
                @if ($item['image'])
                <img src="{{ Storage::url( $item['image']) }}" class="rounded square-2 img-thumbnail" alt="..." style='object-fit: cover;'/>
                @else
                <img style='width:300px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                @endif
              </div>
          </div>
          <div class="col-lg-7 col-md-10 text-center" style="margin-top: 5vh">
            <h1 class="display-2 text-white">{{$item['name']}}</h1>
            <p class="text-white mt-0 mb-5">{{$item['short_description']}}</p>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-1 text-white text-center">Technology : {{$item['tech_field']['name']}}</div>
          <div class="col-lg-1 text-center text-white">Modules : <br> {{$item['all_module']}}</div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
@section('content')
<br><br><br><br><br>
<div class="row">
    <div class="col-xl-3">
        {{-- <div class="card"> --}}
            {{-- <div class="card-body"> --}}
                <div class="list-group">
                    <a class="list-group-item list-group-item-action active" onclick="getText(1)" id="info">
                      Information
                    </a>
                    <a class="list-group-item list-group-item-action" onclick="getText(2)" id="material">Materials</a>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
    <div class="col-xl-9">
        <div id="text">
            <h1 class="display-2 text-center">Information</h1><br>
            <div id="editor">{!! html_entity_decode($item['long_description']) !!}</div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
    <script>
        function getText($id){
            let fields=$('#text')
            var info = document.getElementById("info");
            var materi = document.getElementById("material");
            fields.empty()
            if($id==2){
                materi.classList.add("active");
                info.classList.remove("active");
                fields.append(
                    `<h1 class="display-2 text-center">Module List</h1><br>
                        <div class="table-responsive">
                            @foreach ($result as $item)
                            <table class="table align-items-center table-flush">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Module</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($item['module_lists'] as $items)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        @if ($items['material'])
                                            <td>{{$items['material']['title']}}</td>
                                        @else
                                            <td>{{$items['task']['name']}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endforeach
                        </div>
                    `
                )
            }else if($id==1){
                info.classList.add("active");
                materi.classList.remove("active");
                fields.append(
                    `<h1 class="display-2 text-center">Information</h1><br>
        <div id="editor">{!! html_entity_decode($item['long_description']) !!}</div>`
                )
            }
        }
    </script>
@endsection