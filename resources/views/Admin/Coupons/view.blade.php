@extends('Admin.layouts.app')
@section('content')

    <div id="coupon-view" class="container-fluid p-0">

        <!--    Start Insert Card    -->
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="card shadow">
                            <form id="coupon-form"
                            <% if(typeof coupon === 'undefined') { %>
                            action="/products/coupon-view"
                            <% } else { %>action="/products/coupon-view/<%= coupon.id %>"
                            <% } %> method="POST">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="m-0 font-weight-bold"><i class="fab fa-opencart"></i> <%= Title %></h4>
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
                                        <label>Method</label><br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="automatic" name="option" class="custom-control-input" value="Automatic"
                                            <%= (typeof coupon !== 'undefined') ? 'disabled' : ''; %> checked required>
                                            <label class="custom-control-label" for="automatic">Automatic</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="manual" name="option" class="custom-control-input" value="Manual"
                                            <%= (typeof coupon !== 'undefined') ? (coupon.option === 'Manual') ? 'checked disabled' : '' : ''; %> required>
                                            <label class="custom-control-label" for="manual">Manual</label>
                                        </div>
                                    </div>
                                    <div class="form-group col" id="coupon-code-field"
                                    <% if(typeof coupon !== 'undefined') { %><%= 'disabled' %><% } else { %> style="display: none" <% } %>>
                                    <label for="">Code</label>
                                    <input type="text" name="code" class="form-control" placeholder="Enter coupon code" <%= (typeof coupon !== 'undefined') ? 'disabled' : '' %>
                                    value="<%= (typeof coupon !== 'undefined') ? coupon.code : '' %>" aria-label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="">Select Categories</label>
                                    <select class="form-control" id="categories_s2" name="categories" multiple="multiple" style="width: 100%" aria-label>
                                        <% for (const section of categories) { %>
                                        <optgroup label="<%= section.title %>"></optgroup>
                                        <% section.categories.forEach(category => { %>
                                        <option value="<%= category.id %>"
                                        <%= (typeof coupon !== 'undefined') ? (in_array(category.id, coupon.categories)) ? 'selected' : '' : ''; %> >
                                        &nbsp; <%= category.title %>
                                        </option>
                                        <% category.subCategories.forEach(subCategory => { %>
                                        <option value="<%= subCategory.id %>"
                                        <%= (typeof coupon !== 'undefined') ? (in_array(subCategory.id, coupon.categories)) ? 'selected' : '' : ''; %> >
                                        &nbsp; -- <%= subCategory.title %></option>
                                        <% }); %>
                                        <% }); %>
                                        <% } %>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="">Select Users</label>
                                    <select class="form-control select2" name="users" multiple="multiple" style="width: 100%" aria-label>
                                        <% for (const user of users) { %>
                                        <option value="<%= user.email %>"
                                        <%= (typeof coupon !== 'undefined') ? (in_array(user.email, coupon.users)) ? 'selected' : '' : ''; %> >
                                        &nbsp; <%= user.email %></option>
                                        <% } %>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Coupon Type</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="multiple" name="coupon_type" class="custom-control-input" value="Multiple" checked required>
                                        <label class="custom-control-label" for="multiple">Multiple</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="single" name="coupon_type" class="custom-control-input" value="Single"
                                        <%= (typeof coupon !== 'undefined') ? (coupon.coupon_type === 'Single') ? 'checked' : '' : ''; %> required>
                                        <label class="custom-control-label" for="single">Single</label>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Amount Type</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="percent" name="amount_type" class="custom-control-input" value="Percent" checked required>
                                        <label class="custom-control-label" for="percent">Percentage (%)</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fixed" name="amount_type" class="custom-control-input" value="Fixed"
                                        <%= (typeof coupon !== 'undefined') ? (coupon.amount_type === 'Fixed') ? 'checked' : '' : ''; %> required>
                                        <label class="custom-control-label" for="fixed">Fixed (in KSH)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="">Amount</label>
                                    <input type="number" name="amount" class="form-control" placeholder="Enter coupon amount" aria-label required
                                           value="<%= (typeof coupon !== 'undefined') ? coupon.amount : '' %>">
                                </div>
                                <div class="form-group col">
                                    <label>Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date" placeholder="Enter expiry date" min="2021-01-01" max="2021-12-31" required
                                           value="<%= (typeof coupon !== 'undefined') ? moment(coupon.expiry).format('YYYY-MM-DD') : '' %>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-plus-circle"></i> <%= Title %>
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
                        <a href="/products/coupons" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Coupons List<span class="badge badge-primary badge-pill">14</span>
                        </a>
                        <% if(typeof coupon !== 'undefined') { %>
                        <a href="/products/coupon-view" class="list-group-item list-group-item-action">
                            Create Coupon
                        </a>
                        <% } %>
                        <a href="/customers" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
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

    @include('Admin.products.modals')
@endsection
