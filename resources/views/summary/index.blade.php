@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="card">

            <div class="card-header">
                Jumlah kuantitas masuk, keluar dan sisa per barang per bulan nya
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th><a href="#">
                            Current Quantity
                        </a></th>
                        <th><a href="#">
                            Quantity In
                        </a></th>
                        <th><a href="#">
                            Quantity Out
                        </a></th>
                        <th><a href="#">
                            Date
                        </a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queryA as $row)
                        <tr>
                            <td>{{ $row->current_quantity }}</td>
                            <td>{{ $row->quantity_in }}</td>
                            <td>{{ $row->quantity_out }}</td>
                            <td>{{ $row->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <br>

    <div class="container">
    
        <div class="card">

            <div class="card-header">
                Rata-rata jumlah barang masuk per produk per supplier
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th><a href="#">
                            Supplier
                        </a></th>
                        <th><a href="#">
                            Item
                        </a></th>
                        <th><a href="#">
                            Avg Quantity In
                        </a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queryB as $row)
                        <tr>
                            <td>{{ $row->user }}</td>
                            <td>{{ $row->item }}</td>
                            <td>{{ $row->average_quantity_in }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection