@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('admin-active','active')
@section('main-title','Admin')
@section('title','Edit')
@section('page','Form')
@section('content')
	<div class="row">
		<div class=" col-xl-8 order-xl-1">
			<div class="card">
				<form class="needs-validation" novalidate action="{{url('admin/update/'.$user[0]['user']['id'])}}" method="post">
					@csrf
					<div class="card-header">
						@include('baseAdmin.alerts')
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">Edit profile </h3>
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
												<label class="form-control-label" for="input-username">Name</label>
												<input type="text" id="input-username" class="form-control" placeholder="Full Name" name="name" value="{{old('name')?old('name'):$users['user']['name']}}" required>
												<div class="invalid-feedback">
													Form can't be empty, please fill with name.
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email address</label>
												<input type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email"  value="{{old('email')?old('email'):$users['user']['email']}}" required>
												<div class="invalid-feedback">
													Form can't be empty, please fill with email.
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-first-name">Phone</label>
												<input type="text" id="input-first-name" class="form-control" placeholder="Phone" name="phone"  value="{{old('phone')?old('phone'):$users['user']['phone']}}" required>
												<div class="invalid-feedback">
													Form can't be empty, please fill with phone.
												</div>
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
												<input id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('address')?old('address'):$users['address']}}" required>
												<div class="invalid-feedback">
													Can't be empty, please fill with address.
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-city">Province</label>
												<select class="form-control" data-toggle="select" id="province" name="province" onchange="getCity()" required>
														<option value="" disabled selected hidden>Province Name</option>
														@foreach ($province['result'] as $items)    
														<option value="{{$items['id']}}" @if($items['id']==$users['regency']['province_id']) selected @endif>{{$items['name']}}</option>
														@endforeach
													</select>
													<div class="invalid-feedback">
														Can't be empty, please provide valid province.
													</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-country">City</label>
												<select class="form-control" data-toggle="select" id="city" name="city" required>
													@foreach ($city['result'] as $items)
													<option value="{{$items['id']}}" @if($items['id']==$users['regency']['id']) selected @endif>{{$items['name']}}</option>
													@endforeach
												</select>
												<div class="invalid-feedback">
													Can't be empty, please provide valid city.
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4">
								<h6 class=" heading-small text-muted mb-4">Contact Information</h6>
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
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
	</script>
@endsection