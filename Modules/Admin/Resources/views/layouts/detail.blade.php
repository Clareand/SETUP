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
				<form>
					@csrf
					<div class="card-header">
						@include('baseAdmin.alerts')
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">Detail profile </h3>
							</div>
							<div class="col-4 text-right">
								<a href="{{url('admin/edit/'.$user[0]['id'])}}" type="submit" class="btn btn-olive">Edit</a>
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
												<input disabled type="text" id="input-username" class="form-control" placeholder="Full Name" name="name" value="{{old('name')?old('name'):$users['user']['name']}}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-email">Email address</label>
												<input disabled type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email"  value="{{old('email')?old('email'):$users['user']['email']}}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-first-name">Phone</label>
												<input disabled type="text" id="input-first-name" class="form-control" placeholder="Phone" name="phone"  value="{{old('phone')?old('phone'):$users['user']['phone']}}">
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
												<input disabled id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('address')?old('address'):$users['address']}}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-city">Province</label>
												@if (!$user['regency'])
												<input disabled id="input-address" class="form-control" placeholder="Home Address" name="address" type="text">
												@endif
												<input disabled id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('province')?old('province'):$users['regency']['province']['name']}}">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label" for="input-country">City</label>
												@if (!$user['regency'])
												<input disabled id="input-address" class="form-control" placeholder="Home Address" name="address" type="text" >
												@endif
												<input disabled id="input-address" class="form-control" placeholder="Home Address" name="address" type="text"  value="{{old('city')?old('city'):$users['regency']['name']}}">
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