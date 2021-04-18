
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-10">
            <div class="card crud_table shadow mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info"><i class="fab fa-opencart"></i> SU-F Administrators</h6>
                    <a href="users/create/admin" class="btn btn-outline-info">Add Admin</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-hover crud_table" id="admins_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>email</th>
                                <th>gender</th>
                                <th>Phone</th>
                                <th>ID</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <% admins.forEach(row => { %>
                            <tr>
                                <td></td>
                                <% if(imageExists('admin', row.image)) {%>
                                <td><img src="/images/users/admin/<%= row.image %>" alt="profile" class="img-fluid"></td>
                                <% } else { %>
                                <td><img src="/images/general/NO-IMAGE.png" alt="profile" class="img-fluid"></td>
                                <% } %>
                                <td><%= row.first_name %></td>
                                <td><%= row.last_name %></td>
                                <td><%= row.email %></td>
                                <td><%= row.gender %></td>
                                <td><%= row.phone %></td>
                                <td><%= row.national_id %></td>
                                <td><%= moment(row.date).format('DD/MM/YYYY') %></td>
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



    <!--    Start delete modal    -->

    <div class="modal fade" id="del_product_modal ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/products" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel ?>">Delete Product</h5>
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