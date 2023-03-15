@extends('layouts.admin-dashboard')

@section('title', 'Home')

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des commandes</h4>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
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
                                        <td>
                                            <button type="button">Select<span class="sr-only">, Hobby</span></button>
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
