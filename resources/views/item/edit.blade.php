@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
                

                @role('supplier')
                    <div class="card-header">{{ __('Add Stock') }} {{ $item->name }} <strong>(current stock(s) : {{ $item->stock }})</strong></div>
                @endrole

                @role('distributor')
                    <div class="card-header">{{ __('Reduce Stock') }} {{ $item->name }} <strong>(current stock(s) : {{ $item->stock }})</strong></div>
                @endrole

                <div class="card-body">
                    <form method="POST" action="{{ route('items.update', ['item' => $item]) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection