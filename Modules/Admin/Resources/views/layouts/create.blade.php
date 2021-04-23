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
					<form class="needs-validation" novalidate action="{{route('register')}}" method="post">
						@csrf
						<div class="card-header">
							@include('baseAdmin.alerts')
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Add new profile </h3>
								</div>
								<div class="col-4 text-right">
									<button type="submit" class="btn btn-olive">Save</button>
								</div>
							</div>
						</div>
						<div class="card-body">
							<input type="hidden" name="role" value="1">
							<h6 class="heading-small text-muted mb-4">User information</h6>
							<div class="pl-lg-4">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-control-label" for="input-username">Name</label>
											<input type="text" id="input-username" class="form-control" placeholder="Full Name" name="name" required>
											<div class="invalid-feedback">
												Please insert full name.
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-control-label" for="input-email">Email address</label>
											<input type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email" required>
											<div class="invalid-feedback">
												Please insert valid email.
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-control-label" for="input-email">Phone</label>
											<input type="text" class="form-control" placeholder="08XXXXXXXXXX" name="phone" required>
											<div class="invalid-feedback">
												Please insert phone number.
											</div>
										</div>
									</div>	
								</div>
							</div>
							<hr class="my-4">
							<h6 class="heading-small text-muted mb-4">Contact information</h6>
							<div class="pl-lg-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="form-control-label" for="input-address">Address</label>
											<input id="input-address" class="form-control" placeholder="Home Address" name="address" type="text" required>
											<div class="invalid-feedback">
												Please insert full address.
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-control-label" for="input-city">Province</label>
											<select class="form-control selects" data-toggle="select" id="province" name="province" onchange="getCity()" required>
													<option value="" disabled selected hidden>Province Name</option>
													@foreach ($province as $item)    
													<option value="{{$item['id']}}">{{$item['name']}}</option>
													@endforeach
												</select>
												<div class="invalid-feedback">Please provide valid province.</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-control-label" for="input-country">City</label>
											<select class="form-control selects" data-toggle="select" id="city" name="city" required>
													<option value="" disabled selected hidden>City Name</option>
											</select>
											<div class="invalid-feedback">please provide valid city.</div>
										</div>
									</div>
								</div>
							</div>
							<hr class="my-4">
								<h6 class="heading-small text-muted mb-4">Password</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-username">Password</label>
												<input type="password" id="input-username" class="form-control" name="password" required>
												<div class="invalid-feedback">
													Please insert password.
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Password Confirmation</label>
												<input type="password" id="input-email" class="form-control" name="password_confirmation" required>
												<div class="invalid-feedback">
													Please re-enter password.
												</div>
											</div>
										</div>
									</div>
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