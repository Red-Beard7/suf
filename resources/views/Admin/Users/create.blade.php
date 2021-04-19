@extends('Admin.layouts.app')
@section('content')

    <div id="add_user" class="container-fluid p-0">

        <!--    Start Insert Card    -->
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="card shadow">
                            <form id="frm_add_user" action="{{ route('admin.user', ['user' => 'Admin']) }}" method="POST" enctype="multipart/form-data">
                                @if(isset($admin)) @method('PUT') @endif @csrf
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="m-0 font-weight-bold"><i class="fab fa-opencart"></i> Add {{ $user }}</h4>
                                    <div class="dropdown no-arrow">
                                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Order Options</div>
                                            <a class="dropdown-item" href="../../admin/index.php?view_products">View Products</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="">First name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                   placeholder="Enter first name *" aria-label required>
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Last name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Enter last name *" aria-label required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="Enter username" aria-label>
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Enter email address *" aria-label required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="">Phone</label>
                                            <input type="number" name="phone" class="form-control" pattern="((^0[17]+)|(^[17]+)).*"
                                                   placeholder="Enter phone number *" aria-label required>
                                        </div>
                                        <div class="form-group col">
                                            <label for="national_id">National Id</label>
                                            <input type="number" id="national_id" name="national_id" class="form-control"
                                                   placeholder="Enter National ID number *" aria-label required>
                                        </div>
                                        @if($user === 'Admin')
                                            <div class="form-group col">
                                                <label for="">Pin</label>
                                                <input type="number" name="pin" class="form-control"
                                                       placeholder="Enter pin number" aria-label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Gender</label>
                                            <div class="custom-control custom-radio custom-control">
                                                <input type="radio" id="Male" name="gender" class="custom-control-input" value="M" required>
                                                <label class="custom-control-label" for="Male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control">
                                                <input type="radio" id="Female" name="gender" class="custom-control-input" value="F" required>
                                                <label class="custom-control-label" for="Female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Profile Picture</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <label class="custom-file-label">Choose image</label>
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter current address" aria-label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="">New password</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Enter new password *" aria-label required>
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="confirmPassword" class="form-control"
                                                   placeholder="Confirm you new password *" aria-label required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="hidden"  name="user_type" value="<%= userType %>">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-plus-circle"></i> Create {{ $user }}
                                    </button>
                                    <img class="d-none loader_gif" src="/images/loaders/Gear-0.2s-200px.gif" alt="loader.gif">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card crud_table shadow mb-4">
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.admins') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                All Admins<span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="{{ route('admin.sellers') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                All Sellers<span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="{{ route('admin.customers') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                All Customers<span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Orders<span class="badge badge-primary badge-pill">7</span>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Quantity Sold<span class="badge badge-primary badge-pill">17</span>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Remaining stock<span class="badge badge-primary badge-pill">37</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    End Insert Card    -->
    </div>

@endsection
