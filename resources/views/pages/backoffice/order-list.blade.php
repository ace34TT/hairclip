@extends('layouts.admin-dashboard')

@section('title', 'Liste de commandes')

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des commandes</h4>
                    <button onclick="ExportToExcel('xlsx')" type="button" class="btn btn-primary">Exporter les
                        donnees</button>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table id="orders" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paiement</th>
                                    <th>Client</th>
                                    <th>Mail</th>
                                    <th>Addresse</th>
                                    <th>Quantite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr onclick="window.location.href = '{{ route('admin.order-details', ['order_id' => $order['id']]) }}'"
                                        style="" class="hover-bg-secondary-subtle">
                                        <td>
                                            {{ $order['id'] }}
                                        </td>
                                        <td>
                                            <span>{{ $order['payment_intent_id'] }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $order['customer_last_name'] . ' ' . $order['customer_first_name'] }}</span>
                                        </td>
                                        <td>
                                            {{ $order['customer_emil'] }}
                                        </td>
                                        <td>
                                            {{ $order['shipping_address'] }}
                                        </td>
                                        <td>
                                            {{ $order['quantity'] }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('orders');
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            return dl ?
                XLSX.write(wb, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                }) :
                XLSX.writeFile(wb, fn || ('commandes.' + (type || 'xlsx')));
        }
    </script>
@endsection
