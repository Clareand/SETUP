@extends('baseAdmin.main')
@section('user-active','active')
@section('user-collapse','show')
@section('student-active','active')
@section('main-title','Student')
@section('title','List')
@section('page','Detail')
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
                            <a href="{{url('student/edit/'.$user[0]['id'])}}" type="submit" class="btn btn-olive">Edit</a>
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
                                            <label class="form-control-label" for="input-email">Last Name</label>
                                            <input disabled type="text" class="form-control" placeholder="jesse@example.com" name="email"  value="{{old('last_name')?old('last_name'):$users['last_name']}}">
                                        </div>
                                    </div>
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
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="address" type="text"  value="{{old('address')?old('address'):$users['address']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Province</label>
                                            @if ($users['regency'])
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="province" type="text"  value="{{old('province')?old('province'):$users['regency']['province']['name']}}">
                                            @endif
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="province" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">City</label>
                                            @if ($users['regency'])
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="city" type="text"  value="{{old('city')?old('city'):$users['regency']['name']}}">
                                            @endif
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="city" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal Code</label>
                                            <input disabled id="input-address" class="form-control" placeholder="-" name="postal_code" type="text"  value="{{old('postal_code')?old('postal_code'):$users['postal_code']}}">
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