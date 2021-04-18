@extends('Admin.layouts.app')
@section('content')

    <div class="container-fluid p-0">
    <div class="row">
        <div class="col-10">
            <div class="card crud_table shadow mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info"><i class="fab fa-opencart"></i> SU-F Sellers</h6>
                    <a href="users/create/seller" class="btn btn-outline-info">Add Seller</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-hover crud_table" id="sellers_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>username</th>
                                <th>email</th>
                                <th>gender</th>
                                <th>Phone</th>
                                <th>ID</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <% sellers.forEach(row => { %>
                            <tr>
                                <td></td>
                                <% if(imageExists('seller', row.image)) {%>
                                <td><img src="/images/users/seller/<%= row.image %>" alt="profile" class="img-fluid"></td>
                                <% } else { %>
                                <td><img src="/images/general/NO-IMAGE.png" alt="profile" class="img-fluid"></td>
                                <% } %>
                                <td><%= row.first_name %></td>
                                <td><%= row.last_name %></td>
                                <td><%= row.username %></td>
                                <td><%= row.email %></td>
                                <td><%= row.gender %></td>
                                <td><%= row.phone %></td>
                                <td><%= row.national_id %></td>
                                <td><%= moment(row.date).format('DD/MM/YYYY') %></td>
                                <td class="action">
                                    <a href="#" class="ml-4" title="Modify"><i class="fas fa-pen text-dark"></i></a>
                                    <a href="#" class="ml-3 delete_user" title="Remove" data-id="<%= row.user_id %>">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
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

@endsection