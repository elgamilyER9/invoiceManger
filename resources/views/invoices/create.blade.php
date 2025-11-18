@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            
           <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- ID -->
    <div class="mb-3">
        <label for="id" class="form-label">{{ __("ID") }}</label>
        <input type="number" name="id" value="{{ old('id') }}" class="form-control">
        @error('id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <!-- User -->
    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" class="form-control">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} (ID: {{ $user->id }})
                </option>
            @endforeach
        </select>
        @error('user_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Client -->
    <div class="mb-3">
        <label for="client_id" class="form-label">Client</label>
        <select name="client_id" class="form-control">
            <option value="">-- Select Client --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->name }} (ID: {{ $client->id }})
                </option>
            @endforeach
        </select>
        @error('client_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Invoice Number -->
    <div class="mb-3">
        <label for="invoice_number" class="form-label">{{ __("Invoice Number") }}</label>
        <input type="text" name="invoice_number" value="{{ old('invoice_number') }}" class="form-control">
        @error('invoice_number')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Total Amount -->
    <div class="mb-3">
        <label for="total_amount" class="form-label">{{ __("Total Amount") }}</label>
        <input type="number" placeholder="00.00" step="0.01" name="total_amount" value="{{ old('total_amount') }}" class="form-control">
        @error('total_amount')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Invoice Date -->
    <div class="mb-3">
    <label for="invoice_date" class="form-label">Invoice Date</label>
    <input type="date" name="invoice_date" class="form-control" 
           value="{{ old('invoice_date', date('Y-m-d')) }}">
</div>

    <!-- Due Date -->
  <div class="mb-3">
    <label for="due_date" class="form-label">{{ __("Due Date & Time") }}</label>
    <input type="datetime-local" 
           name="due_date" 
           id="due_date" 
           class="form-control"
           value="{{ old('due_date', date('Y-m-d\TH:i')) }}">
    @error('due_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


    <!-- Notes -->
    <div class="mb-3">
        <label for="notes" class="form-label">{{ __("Notes") }}</label>
        <textarea name="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
        @error('notes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>



    <!-- Submit -->
    <button type="submit" class="btn btn-success w-100">
        {{ __("Create New Invoice") }}
    </button>
</form>

        </div>
    </div>
</div>
@endsection