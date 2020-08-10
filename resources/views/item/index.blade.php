@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="card">

            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50%"><a href="#">
                            Name
                        </a></th>
                        <th><a href="#">
                            Stock
                        </a></th>
                        <th style="width: 20%">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                @role('supplier')
                                    <a class="btn btn-success" href="{{ route('items.edit', ['item' => $item]) }}" role="button">Add Stock</a>
                                @endrole

                                @role('distributor')
                                    <a class="btn btn-danger" href="{{ route('items.edit', ['item' => $item]) }}" role="button">Reduce Stock</a>
                                @endrole
                                
                                <a class="btn btn-primary" href="{{ route('items.show', ['item' => $item]) }}" role="button">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection