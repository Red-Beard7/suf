@extends('Admin.layouts.app')
@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--Author      : @arboshiki-->
    <div id="invoice">

        <div class="toolbar hidden-print">
            <div class="text-right">
                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                <a href="http://localhost:8000/admin/invoice-pdf/<%= order.id %>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Generate PDF</a>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <a target="_blank" href="https://lobianijs.com">
                                <img src="/images/general/store_logo.jpg" data-holder-rendered="true" width="130" height="130"  alt="logo"/>
                            </a>
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com" style="color: #9F1910FF;">
                                    SU-FASHION
                                </a>
                            </h2>
                            <div>455 Foggy Heights, AZ 85004, US</div>
                            <div>+254 110-039-317</div>
                            <a href="mailto:su.fashion10@gmail.com" style="color: #9F1910FF;">su.fashion10@gmail.com</a>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to"><%= order.first_name %> <%= order.last_name %></h2>
                            <div class="address"><%= order.address %>, <%= order.subCounty %>, <%= order.county %></div>
                            <div class="email"><a href="mailto:<%= order.email %>"><%= order.email %></a></div>
                            <div class="email"><a href="tel:0<%= order.phone %>">+254-<%= order.phone %></a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE 3-2-1</h1>
                            <div class="date">Date of Invoice: 01/10/2018</div>
                            <div class="date">Due Date: 30/10/2018</div>
                            <hr>
                            <div class="date"><h4>Order #<%= order.id %></h4></div>
                            <div class="date">Order Date: <%= moment(order.created_at).format('MMMM Do YYYY') %></div>
                        </div>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">UNIT PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>

                        <%
                        let total = 0
                        order.orderProducts.forEach((product, i) => {
                        subTotal = product.final_unit_price * product.quantity
                        %>
                        <tr>
                            <td class="no">0<%= i + 1 %></td>
                            <td class="text-left">
                                <h3><a href="/products/<%= product.product_id %>"><%= product.title %></a></h3>
                                <% for (const [key, value] of Object.entries(JSON.parse(product.details))) { %>
                                <p class="m-0"><%= key %>: <%= value %></p>
                                <% } %>
                            </td>
                            <td class="unit"><%= product.final_unit_price %>/-</td>
                            <td class="qty"><%= product.quantity %></td>
                            <td class="total"><%= currencyFormat(subTotal) %>/-</td>
                        </tr>
                        <%
                        total += subTotal;
                        })
                        %>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUB-TOTAL</td>
                            <td><%= currencyFormat(total) %>/=</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">DISCOUNT</td>
                            <td><%= currencyFormat(order.discount) %>/=</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><%= currencyFormat(order.total) %>/=</td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div><h5>Payment Method: <%= order.payment_method %></h5></div>
                        <div>
                            <div>NOTICE:</div>
                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                        </div>
                    </div>
                </main>
                <footer class="invoice-footer">
                    Invoice was created on a computer and is valid without the signature and seal.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>

    <script>
        $('#printInvoice').on('click', function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>

@endsection
