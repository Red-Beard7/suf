@extends('Admin.layouts.app')
@section('content')
{{--160-1606471_logo-java.png--}}
    <div class="container-fluid" style="height: 80vh">
        <div class="row h-100 justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 my-auto p-0 bg-light rounded shadow">
                <div class="row">
                    @if(User()->is_admin === 7)
                        <div class="col">
                            <div class="row p-2 position-absolute" style="right:2rem; top:1rem; width: 30%">
                                <div class="col text-right">
                                    <h4>Sir!</h4>
                                    <hr class="mr-0 mb-0 col-3">
                                </div>
                            </div>
                            <img src="{{ asset('images/illustrations/undraw_pie_chart_6efe.svg') }}" alt="">
                        </div>
                    @else
                        <div class="col-lg-5 d-none d-lg-block">
                            @if(empty($admin['image']))
                                <img src="{{ asset('/images/general/store_logo.jpg') }}" alt="login image" class="img-fluid" style="width:100%; height: 100%; object-fit: cover">
                            @else
                                <img src="{{ asset('/images/users/admin/Profile/' . $admin['image']) }}" alt="login image" class="img-fluid" style="width:100%; height: 100%; object-fit: cover">
                            @endif
                        </div>
                        <div class="col-lg-7 p-5 overflow-auto" style="max-height: 35rem">
                            <label style="position: absolute; top: 0; left: 0"> {{ $admin['type'] }} </label>
                            <div class="row">
                                <div class="col text-center">
                                    <h3>Hello {{ $admin['user']['first_name'] }}!</h3>
                                    <hr class="bg-secondary">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form id="admin_profile_form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-0" for="first_name">First Name</label>
                                                <input type="text" class="form-control border-0" id="first_name" name="first_name" value="{{ $admin['user']['first_name'] }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="mb-0" for="last_name">Last Name</label>
                                                <input type="text" class="form-control border-0" id="last_name" name="last_name" value="{{ $admin['user']['last_name'] }}" required>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="form-group">
                                            <label class="mb-0" for="email_address">Email Address</label>
                                            <input type="email" class="form-control border-0" id="email_address" name="email_address" value="{{ $admin['user']['email'] }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-0" for="phone_number">Phone Number</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text border-0">+254</span></div>
                                                <input type="number" class="form-control border-0" id="phone_number" name="phone_number" value="{{ $primaryPhone['phone'] }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" name="admin_crud" value="update_profile_details" class="btn btn-outline-danger">
                                                <i class="fas fa-pen"></i> Update Profile
                                            </button>
                                            <img class="d-none loader_gif" id="loader_gif_detalis" src="{{ asset('/images/loaders/Gear-0.2s-200px.gif') }}" alt="loader.gif">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <h3>Change Password!</h3>
                                    <hr class="bg-secondary">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form id="admin_profile_pass_form">
                                        <div class="form-group">
                                            <input type="hidden" name="admin_pass_id" value="">
                                            <label for="current_pass"></label>
                                            <input type="password" class="form-control border-0" id="current_pass" name="current_pass" placeholder="Current password" required>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="new_pass"></label>
                                                <input type="password" class="form-control border-0" id="new_pass" name="new_pass" placeholder="New password" required>
                                            </div>
                                            <div class="form-group col">
                                                <label for="confirm_pass"></label>
                                                <input type="password" class="form-control border-0" id="confirm_pass" name="confirm_pass" placeholder="Confirm password" required>
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" name="admin_crud" value="update_profile_pass" class="btn btn-outline-danger"><i class="fas fa-pen"></i> Change Password</button>
                                            <img class="d-none loader_gif" id="loader_gif_detalis" src="{{ asset('/images/loaders/Gear-0.2s-200px.gif') }}" alt="loader.gif">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
