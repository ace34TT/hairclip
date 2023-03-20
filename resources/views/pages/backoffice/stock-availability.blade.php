@extends('layouts.admin-dashboard')

@section('title', 'Etat des stocks')

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Etat de stock</h4>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table id="orders" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom du produit</th>
                                    <th>Entrée</th>
                                    <th>Sortie</th>
                                    <th>En stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_status as $item)
                                    <tr style="" class="hover-bg-secondary-subtle">
                                        <td>
                                            {{ $item->product_id }}
                                        </td>
                                        <td>
                                            <span>{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $item->move_in }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $item->move_out }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $item->current_status }}</span>
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
