@extends('baseStudent.main')
@section('header')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-black-blue opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello {{Auth::user()->name}}</h1>
          <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
<div class="row">
  @foreach ($result as $item)    
  <div class="col-xl-4 order-xl-2">
    <div class="card card-profile">
      <img src="{{url('assets/img/picture/cyan-forest.jpg')}}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="{{url('assets/img/picture/cyan-forest-square.jpg')}}" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <br><br><br>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading">{{$item['point']}}</span>
                <span class="description">Points</span>
              </div>
              <div>
                <span class="heading">{{count($item['user']['badges'])}}</span>
                <span class="description">Bagdes</span>
              </div>
              <div>
                <span class="heading">{{count($item['user']['class_lists'])}}</span>
                <span class="description">Class</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          @if ($item['user']['badges'])
            @foreach ($item['user']['badges'] as $badge)
                <div class="text-center">
                  @if ($badge['image'])
                  <img src="{{ Storage::url( $item['image']) }}" class="rounded float-left img-thumbnail" alt="..." style='object-fit:cover/;width:50px;height:50px'>
                  @else
                  <img style='width:50px' src="{{url('assets/img/picture/not-found.png')}}" class="rounded float-left img-thumbnail" alt="...">
                  @endif
                </div>
            @endforeach
          @endif
        </div>
        <br>
        <div class="text-center">
          <h1 class="display-4">
            {{Auth::user()->name}} {{$item['last_name']}}<span class="font-weight-light"></span>
          </h1>
          <div class="h5 font-weight-300">
            @if (isset($item['regency']['province']))
            <i class="ni location_pin mr-2"></i>{{$item['regency']['province']['name']}},  
            @endif
            Indonesia
          </div>
          <div class="h5 mt-4">
            <i class="ni business_briefcase-24 mr-2"></i>100/1000
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class=" col-xl-8 order-xl-1">
      <div class="card">
          <form action="{{url('app/profile/update/'.$item['id'])}}" method="post">
              @csrf
              <div class="card-header">
                  @include('baseAdmin.alerts')
                  <div class="row align-items-center">
                      <div class="col-8">
                          <h3 class="mb-0">Detail profile </h3>
                      </div>
                      <div class="col-4 text-right">
                          <button type="submit" class="btn btn-olive">Save</button>
                      </div>
                  </div>
                  <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">First Name</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Stjärna" name="name" value="{{old('name')?old('name'):$item['user']['name']}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email"  value="{{old('email')?old('email'):$item['user']['email']}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Last Name</label>
                                    <input type="text" id="input-last-name" class="form-control" placeholder="Doe" name="last_name"  value="{{old('last_name')?old('last_name'):$item['last_name']}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Phone</label>
                                    <input  type="text" id="input-first-name" class="form-control" placeholder="08XXXXXXXXXXX" name="phone"  value="{{old('phone')?old('phone'):$item['user']['phone']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    {{-- Address --}}
                    <h6 class=" heading-small text-muted mb-4">Contact Information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Address</label>
                                    <input id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('address')?old('address'):$item['address']}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Province</label>
                                    <select class="form-control selects" data-toggle="select" id="province" name="province" onchange="getCity()">
                                        <option value="" disabled selected hidden>Province Name</option>
                                        @foreach ($province['result'] as $items)  
                                            @if ($item['regency'])
                                            <option value="{{$items['id']}}" @if($items['id']==$item['regency']['province_id']) selected @endif>{{$items['name']}}</option>
                                            @endif  
                                            <option value="{{$items['id']}}">{{$items['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">City</label>
                                    <select class="form-control selects" data-toggle="select" id="city" name="city">
                                        <option value="" disabled selected hidden>City Name</option>
                                        @if ($item['regency'])
                                            @foreach ($city['result'] as $items)
                                            <option value="{{$items['id']}}" @if($items['id']==$item['regency']['id']) selected @endif>{{$items['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Postal Code</label>
                                    <input type="text" id="input-email" class="form-control" placeholder="12345" name="postal_code"  value="{{old('postal_code')?old('postal_code'):$item['user']['postal_code']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class=" heading-small text-muted mb-4">Password Information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">Password</label>
                            <input type="password" id="input-username" class="form-control" name="password">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Password Confirmation</label>
                            <input type="password" id="input-email" class="form-control" name="password_confirmation">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
  @endforeach
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