@extends('layouts.admin-dashboard')

@section('title', 'Tableau de bord')

@section('content')
    <div class="bg-slate-200 w-full h-full">
        <h1>Commandes des 7 derniers jours </h1>
        <canvas id="myChart" height="100px"></canvas>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};
        const data = {
            labels: labels,
            datasets: [{
                label: 'last orders',
                backgroundColor: 'rgb(52, 149, 235)',
                borderColor: 'rgb(52, 149, 235)',
                data: users,
                lineTension: 0.5
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
