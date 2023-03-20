@extends('layouts.admin-dashboard')

@section('title', 'Home')

@section('Details de commande')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Details de la commande : {{ $order['id'] }}</h4>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table id="orders" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom du produit</th>
                                    <th>Quantite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $details)
                                    <tr style="" class="hover-bg-secondary-subtle">
                                        <td>
                                            {{ $details->order_detail_id }}
                                        </td>
                                        <td>
                                            <span>{{ $details->name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $details->total_by_details }}</span>
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
@endsection
