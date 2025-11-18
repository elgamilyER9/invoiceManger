@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            
        <form action="{{ route('invoiceItems.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- ID -->
    <div class="mb-3">
        <label for="id" class="form-label">{{ __("ID") }}</label>
        <input type="number" name="id" value="{{ old('id') }}" class="form-control @error('id') is-invalid @enderror">
        @error('id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <!-- Invoice -->
    <div class="mb-3">
        <label for="invoice_id" class="form-label">{{ __("Invoice") }}</label>
        <select name="invoice_id" class="form-control @error('invoice_id') is-invalid @enderror">
            <option value="">-- Select Invoice --</option>
            @foreach($invoices as $invoice)
                <option value="{{ $invoice->id }}" {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
                    ID: {{ $invoice->id }}
                </option>
            @endforeach
        </select>
        @error('invoice_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
 
    <!-- Quantity -->
    <div class="mb-3">
        <label for="quantity" class="form-label">{{ __("Quantity") }}</label>
        <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror">
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Price -->
    <div class="mb-3">
        <label for="price" class="form-label">{{ __("Price") }}</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

   
    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">{{ __("Description") }}</label>
        <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror">
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success w-100">
        {{ __("Create New Invoice Item") }}
    </button>
</form>


        </div>
    </div>
</div>
@endsection