@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('student-active','active')
@section('main-title','Student')
@section('title','Edit')
@section('page','Form')
@section('content')
<div class="row">
    <div class=" col-xl-8 order-xl-1">
        <div class="card">
            <form action="{{url('student/update/'.$user[0]['id'])}}" method="post">
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
                        @foreach ($user as $users)
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">First Name</label>
                                            <input type="text" id="input-username" class="form-control" placeholder="Jesse" name="name" value="{{old('name')?old('name'):$users['user']['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email"  value="{{old('email')?old('email'):$users['user']['email']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Last Name</label>
                                            <input type="text" id="input-last-name" class="form-control" placeholder="Doe" name="last_name"  value="{{old('last_name')?old('last_name'):$users['last_name']}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Phone</label>
                                            <input  type="text" id="input-first-name" class="form-control" placeholder="08XXXXXXXXXXX" name="phone"  value="{{old('phone')?old('phone'):$users['user']['phone']}}">
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
                                            <input id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('address')?old('address'):$users['address']}}">
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
                                                    @if ($users['regency'])
                                                    <option value="{{$items['id']}}" @if($items['id']==$users['regency']['province_id']) selected @endif>{{$items['name']}}</option>
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
                                                @if ($users['regency'])
                                                    @foreach ($city['result'] as $items)
                                                    <option value="{{$items['id']}}" @if($items['id']==$users['regency']['id']) selected @endif>{{$items['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Postal Code</label>
                                            <input type="text" id="input-email" class="form-control" placeholder="12345" name="postal_code"  value="{{old('postal_code')?old('postal_code'):$users['postal_code']}}">
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
                        @endforeach
                    </div>
                </div>
            </form>
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