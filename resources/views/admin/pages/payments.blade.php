@extends('admin.layouts.app')
@section('content')

    <div id="payments" class="container-fluid p-0">
        <div class="row">
            <div class="col-9">
                <div class="card crud_table shadow mb-4">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info"><i class="fab fa-opencart"></i> SU-F Payments</h6>
                        <button class="btn btn-outline-info">Add Payment</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-hover crud_table" id="payments_table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <% payInfo.payments.forEach((row) => { %>
                                <tr>
                                    <td></td>
                                    <td><%= row.user_id %></td>
                                    <td><%= row.pay_amount %></td>
                                    <td><%= row.pay_method %></td>
                                    <td><%= row.pay_code %></td>
                                    <td><%= payInfo.moment(row.pay_date).format('DD/MM/YY') %></td>
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

        <div class="modal fade" id="del_product_modal<?= $productId ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.products') }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?= $productId ?>">Delete Product</h5>
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

    @include('admin.products.modals')

    <script>
        const paymentDataTable = $('#payments_table').DataTable({
            scrollY:        '50vh',
            scrollCollapse: true,
            paging:         false,
            order: [[5, 'DESC']],
            language: {
                info: 'Number of payments: _MAX_',
                infoFiltered:   "(filtered _TOTAL_ payments)",
                search: "_INPUT_",
                searchPlaceholder: "Search payment"
            },
            columnDefs: [
                { searchable: false, orderable: false, targets: 0 },
                { searchable: false, orderable: false, targets: 6 }
            ]
        });
        paymentDataTable.on( 'order.dt search.dt', function () {
            paymentDataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell["innerHTML"] = i+1;
            });
        }).draw();
    </script>
@endsection
