@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                {{ $item->name }} <span class="badge badge-primary">{{ $item->stock }}</span>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th><a href="#">
                            Quantity In
                        </a></th>
                        <th><a href="#">
                            Quantity Out
                        </a></th>
                        <th><a href="#">
                            User
                        </a></th>
                        <th><a href="#">
                            Created Date
                        </a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->histories as $history)
                        <tr>
                            <td>{{ $history->quantity_in }}</td>
                            <td>{{ $history->quantity_out }}</td>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection