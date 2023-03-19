@extends('layouts.admin-dashboard')

@section('title', 'Mouvement de stocks')

@section('content')
    <h4 class="card-title">Formulaire d'insertion stock</h4>
    <form class="row g-3" method="POST" action="{{ route('admin.restock') }}">
        @csrf
        <div class="col-md-6">
            <label for="inputState" class="form-label">Produit</label>
            <select id="inputState" name="product_id" required class="form-select">
                <option selected>Choisir...</option>
                @foreach ($products as $product)
                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Quantite</label>
            <input type="number" name="quantity" required min="0" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary ml-auto">Ajouter</button>
        </div>
    </form>
    <br>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mouvements de stock</h4>
                    <button onclick="ExportToExcel('xlsx')" type="button" class="btn btn-primary">Exporter les
                        donnees</button>
                    <div class="table-responsive">
                        <table id="stock-movements" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id du produit</th>
                                    <th>Nom du produit</th>
                                    <th>quantité</th>
                                    <th>Type de mouvement</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_movements as $stock_movement)
                                    <tr style="" class="hover-bg-secondary-subtle">
                                        <td>
                                            {{ $stock_movement->id }}
                                        </td>
                                        <td>
                                            <span>{{ $stock_movement->product_id }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $stock_movement->name }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $stock_movement->quantity }}</span>
                                        </td>
                                        <td>
                                            @if ($stock_movement->type === 1)
                                                <p style="color: rgb(231, 55, 55)">
                                                    Sortie
                                                </p>
                                            @else
                                                <p style="color:rgb(91, 228, 91)">
                                                    Entrée
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $stock_movement->created_at }}
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

@section('script')
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('stock-movements');
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
