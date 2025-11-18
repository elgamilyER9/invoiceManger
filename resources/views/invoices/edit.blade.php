@extends('layouts.app')
 @section('content')
<title>Dashboard</title>

    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form  enctype="multipart/form-data" action={{ route('invoices.update', $invoices->id) }} method="POST"  >
                    @csrf <input type="hidden" name="old_id" value={{ $invoices->id }}> 
                    
                     <!-- ID -->
    <div class="mb-3">
        <label for="id" class="form-label">{{ __("ID") }}</label>
        <input type="number" name="id" value={{ $invoices->id }}  class="form-control">
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
        <option value="{{ $user->id }}"
            {{ old('user_id', $invoices->user_id) == $user->id ? 'selected' : '' }}>
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
        <option value="{{ $client->id }}"
            {{ old('client_id', $invoices->client_id) == $client->id ? 'selected' : '' }}>
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
        <input type="text" value={{ $invoices->invoice_number }} name="invoice_number"  class="form-control">
        @error('invoice_number')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Total Amount -->
    <div class="mb-3">
        <label for="total_amount" class="form-label">{{ __("Total Amount") }}</label>
        <input type="number" step="0.01" name="total_amount" value={{ $invoices->total_amount }} class="form-control">
        @error('total_amount')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <!-- Invoice Date -->
    <div class="mb-3">
        <label for="invoice_date" class="form-label">{{ __("Invoice Date") }}</label>
        <input type="date"
         name="invoice_date"
          value={{ $invoices->invoice_date }}
           class="form-control">
        @error('invoice_date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Due Date -->
<div class="mb-3">
    <label for="due_date" class="form-label">{{ __("Due Date") }}</label>
    <input type="datetime-local" 
           name="due_date" 
           class="form-control"
           value="{{ old('due_date', \Carbon\Carbon::parse($invoices->due_date)->format('Y-m-d\TH:i')) }}">
    @error('due_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


    <!-- Notes -->
    <div class="mb-3">
        <label for="notes" class="form-label">{{ __("Notes") }}</label>
        <textarea name="notes" rows="3" value={{ $invoices->notes }} class="form-control"></textarea>
        @error('notes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>



                    <input type="submit" value="{{ __("Updata") }}" class="btn btn-success w-100">
                </form>
          
        </div>
    </div>
</div>
@endsection
