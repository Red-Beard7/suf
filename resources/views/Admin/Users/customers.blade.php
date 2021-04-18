@extends('Admin.layouts.app')
@section('content')

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-9">
                <div class="card crud_table shadow mb-4">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fab fa-opencart"></i> SU-F Customers</h6>
                        <button class="btn btn-outline-info">Add Customer</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-hover crud_table" id="customers_table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>email</th>
                                    <th>gender</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <% customerInfo.users.forEach((row) => { %>
                                <tr>
                                    <td></td>
                                    <td><%= row.user_first_name %></td>
                                    <td><%= row.user_last_name %></td>
                                    <td><%= row.user_email %></td>
                                    <td><%= row.user_gender %></td>
                                    <td><%= customerInfo.moment(row.pro_date).format('DD/MM/YYYY') %></td>
                                    <td class="action">
                                        <a href="#" class="ml-4" title="Modify"><i class="fas fa-pen text-dark"></i></a>
                                        <a href="#" class="ml-3" title="Remove"><i class="fas fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                <% }) %>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--    Start Edit modal    -->

        <div class="modal fade" id="edit_product_modal">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content bg-dark text-warning overflow-auto">
                    <form id="edit_product_form" class="edit_product_form" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen"></i> Edit Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col mb-2">
                                    <input type="hidden" id="u_product_id" name="u_product_id">
                                    <label for="u_product_title" class="mb-0">Product Title *</label>
                                    <input type="text" id="u_product_title" name="u_product_title" class="form-control" placeholder="Enter product title *">
                                </div>
                                <div class="form-group col mb-2">
                                    <label for="u_manufacturer" class="mb-0">Product Manufacturer *</label>
                                    <select name="u_manufacturer" id="u_manufacturer" class="form-control">
                                        <option hidden value="">Select a Manufacturer *</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-2">
                                    <label for="u_product_cat" class="mb-0">Product Category *</label>
                                    <select name="u_product_cat" id="u_product_cat" class="form-control">
                                        <option hidden value="">Select product category *</option>

                                    </select>
                                </div>
                                <div class="form-group col mb-2">
                                    <label for="u_target_cat" class="mb-0">Target Category *</label>
                                    <select name="u_target_cat" id="u_target_cat" class="form-control">
                                        <option hidden value="">Select target category *</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="mb-0">Product Images</label>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-4 mb-0">
                                        <div class="input-group my-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" id="u_product_img1" name="u_product_img1" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="u_product_img1">Choose Image 1</label>
                                            </div>
                                        </div>
                                        <img src="" alt="" class="img-fluid e_product_img1" style="width: 4.7rem">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 mb-0">
                                        <div class="input-group my-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" id="u_product_img2" name="u_product_img2" aria-describedby="inputGroupFileAddon02">
                                                <label class="custom-file-label" for="u_product_img2">Choose Image 2</label>
                                            </div>
                                        </div>
                                        <img src="" alt="" class="img-fluid e_product_img2" style="width: 4.7rem">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 mb-0">
                                        <div class="input-group my-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon03">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" id="u_product_img3" name="u_product_img3" aria-describedby="inputGroupFileAddon03">
                                                <label class="custom-file-label" for="u_product_img3">Choose Image 3</label>
                                            </div>
                                        </div>
                                        <img src="" alt="" class="img-fluid e_product_img3" style="width: 4.7rem">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="u_product_keywords" class="mb-0">Product Keywords</label>
                                <input type="text" id="u_product_keywords" name="u_product_keywords" class="form-control" placeholder="Enter product keywords">
                            </div>
                            <div class="form-group mb-2">
                                <label for="u_product_price" class="mb-0">Product Price *</label>
                                <input type="number" id="u_product_price" name="u_product_price" class="form-control" placeholder="Enter product price *" value="11">
                            </div>
                            <div class="form-group">
                                <label>Product Label *</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="u_product_label1" name="u_product_label" class="custom-control-input" value="new" required>
                                    <label class="custom-control-label" for="u_product_label1">New</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="u_product_label2" name="u_product_label" class="custom-control-input" value="sale" required>
                                    <label class="custom-control-label" for="u_product_label2">Sale</label>
                                </div>
                            </div>
                            <div class="form-group mb-2 u_product_sale_price_div" style="display:none">
                                <label for="u_product_sale_price" class="mb-0">Product Sale Price *</label>
                                <input type="number" id="u_product_sale_price" name="u_product_sale_price" class="form-control" placeholder="Enter product sale price *">
                            </div>
                            <div class="form-group mb-2">
                                <label for="u_product_desc" class="mb-0">Product Description</label>
                                <textarea id="u_product_desc" name="u_product_desc" cols="30" rows="7" class="form-control" placeholder="Enter product description..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                            <button type="submit" value="update_product" name="product_crud" class="btn btn-warning">
                                <i class="fas fa-plus-circle"></i> Update Product
                            </button>
                            <img class="loader_gif" src="{{ asset('images/loaders/Gear-0.2s-200px.gif') }}" alt="loader.gif">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--    End Edit modal    -->

        <!--    Start delete modal    -->

        <div class="modal fade" id="del_product_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="#" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to delete this product?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="yes" value="Delete Product" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--    End delete modal    -->
    </div>

@endsection
