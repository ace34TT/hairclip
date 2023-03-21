@extends('layouts.admin-dashboard')

@section('title', 'Details commande')

@section('content')
    <div class=" container-fluid mt-100 mb-100">
        <div id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">
                        Commande<strong>#{{ $order->id }} </strong>
                        <div class="pull-right">
                            <a onclick="printDiv()" class="btn btn-sm btn-info" href="#" data-abc="true"><i
                                    class="fa fa-print mr-1"></i>
                                Imprimer</a>
                            <a class="btn btn-sm btn-info" href="#" data-abc="true"><i
                                    class="fa fa-file-text-o mr-1"></i>Sauvegarder</a>
                        </div>
                    </div>
                    <div id="GFG" class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3">De:</h6>
                                <div><strong>Hairclip</strong></div>
                                <div>546 Aston Avenue</div>
                                <div>NYC, NY 12394</div>
                                <div>Email: contact@bbbootstrap.com</div>
                                <div>Phone: +1 848 389 9289</div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">A:</h6>
                                <div><strong>{{ $order->customer_last_name . ' ' . $order->customer_first_name }}</strong>
                                </div>
                                <div>{{ $order->shipping_address }}</div>
                                <div>{{ $order->shipping_city }}</div>
                                <div>Email: {{ $order->customer_emil }}</div>
                                <div>Telephone: {{ $order->customer_phone }}</div>
                            </div>

                            <div class="col-sm-4">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice<strong> #{{ $order->id }}</strong></div>
                                <div>{{ date('d m y', strtotime($order->created_at)) }}</div>
                                {{-- <div>VAT: BBB0909090</div> --}}
                                {{-- <div>Account Name: BANK OF AMERICA</div> --}}
                                {{-- <div><strong>SWIFT code: 985798579487</strong></div> --}}
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Couleur</th>
                                        <th class="center">Quantité</th>
                                        <th class="right">Prix unitair</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails as $orderDetail)
                                        <tr>
                                            <td class="center">{{ $orderDetail->product_id }}</td>
                                            <td class="left">{{ $orderDetail->name }}</td>
                                            <td class="left">{{ $orderDetail->total_by_details }}</td>
                                            <td class="center">{{ $orderDetail->price }} €</td>
                                            <td class="right">{{ $orderDetail->price * $orderDetail->total_by_details }} €
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                                {{-- Contrary to popular belief, Lorem Ipsum is not simply random
                                text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000
                                years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. --}}
                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Sous-total</strong></td>
                                            <td class="right">{{ $order->amount }} € </td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Livraison</strong></td>
                                            <td class="right">{{ $order->shipping }} € </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="left"><strong>Discount (0%)</strong></td>
                                            <td class="right">0</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>VAT (10%)</strong></td>
                                            <td class="right">0</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Livraison</strong></td>
                                            <td class="right">{{ $order->shipping }}</td>
                                        </tr> --}}
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong>{{ $order->shipping + $order->amount }} € </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
@endsection
