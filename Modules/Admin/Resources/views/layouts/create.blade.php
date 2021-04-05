@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('admin-active','active')
@section('main-title','Admin')
@section('title','Add')
@section('page','Form')
@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Add new profile </h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-olive">Save</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="POST">
              @csrf
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Name</label>
                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Contact information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">Province</label>
                    <select class="form-control" data-toggle="select" id="province" name="province" onchange="getCity()">
                        <option value="" disabled selected hidden>Province Name</option>
                        @foreach ($province as $item)    
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">City</label>
                    <select class="form-control" data-toggle="select" id="city" name="city">
                        <option value="" disabled selected hidden>City Name</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom-script')
    <script>
        function getCity(){
            var selectCity = $('#city')
            console.log(selectCity)
            selectCity.empty();
            selectCity.append('<option value="" disabled selected hidden>City Name</option>')
            let old_prov = document.getElementById("province").value;
            var token = "{{csrf_token()}}";
            console.log("prov",old_prov)
            console.log(token)
            $.ajax({
                type:'POST',
                url:"<?php echo url('city')?>",
                data:"_token="+token+"&id_province="+old_prov,
                success:function(data){
                    console.log(data['result'])
                        for(var i=0; i<data['result'].length;i++){
                            selectCity.append('<option value=" '+data['result'][i]['id']+'">'+data['result'][i]['name']+'</option>')
                        }
                },
                error:function(data,textStatus,errorThrown){
                    console.log(data)
                }
            });
        }
    </script>
@endsection