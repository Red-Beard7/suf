@extends('Admin.layouts.app')
@section('content')

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-4">
                <div class="card crud_table shadow mb-4">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fab fa-opencart"></i> SU-F Brands</h6>
                        <button class="btn btn-info" data-toggle="modal" data-target="#brand">Add Brand</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-hover crud_table" id="brands_table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number of products</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <% brands.forEach(row => { %>
                                <tr>
                                    <td></td>
                                    <td><%= row.name %></td>
                                    <td>(rand) - <%= Math.floor((Math.random() * 100) + 1) %></td>
                                    <td class="action">
                                        <a href="#" class="mx-2 update_brand" title="Modify" data-toggle="modal" data-target="#brand"
                                           data-id="<%= row.id %>" data-name="<%= row.name %>" data-status="<%= row.status %>">
                                            <i class="fas fa-pen text-dark"></i>
                                        </a>
                                        <a href="#" class="mr-1 delete_brand" data-id="<%= row.id %>" data-image="<%= row.image %>"
                                           data-toggle="modal" data-target="#delete_brand_modal" title="Remove">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                        <% if(row.status === 1) { %>
                                        <a class="update_brand_status mr-4" data-id="<%= row.id %>" title="Update Status"
                                           style="cursor: pointer"><i class="fas fa-toggle-on" status="Active"></i></a>
                                        <% } else { %>
                                        <a class=" update_brand_status mr-2" data-id="<%= row.id %>" title="Update Status"
                                           style="cursor: pointer"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                        <% } %>
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
    </div>

    <%- include('./modals/brand_modals') %>


    @include('Admin.products.modals')

@endsection
