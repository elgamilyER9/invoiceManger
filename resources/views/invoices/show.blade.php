@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
  <div class="card-header">
    {{ __("Invoice Details") }} <span class="btn btn-success">{{$invoices->id}}</span> <span>
      <a href="{{ route('invoices.pdf', $invoices->id) }}" class="btn btn-primary">
    Download Invoice
</a>
    </span>
  </div>
  <table class="table text-center align-middle ">
  <thead>
    <tr>
        <th scope="col">{{ __("ID") }}</th>
      <th scope="col">{{ __("User_id") }}</th>
      <th scope="col">Client_id</th>
      <th scope="col">{{ __("Invoice_number") }}</th>
      <th scope="col">{{ __("Total_amount") }}</th>
      <th scope="col">{{ __("Invoice_date") }}</th>
      <th scope="col">{{ __("Due_date") }}</th>
      <th scope="col">{{ __("Notes") }}</th>
     
      
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
  </thead>
  <tbody>
   
        <tr>
        
            <td>{{$invoices->id}}</td>
            <td>{{$invoices->user_id}}</td>
            <td>{{$invoices->client_id}}</td>
            <td>{{$invoices->invoice_number}}</td>
            <td>{{$invoices->total_amount}}</td>
            <td>{{$invoices->invoice_date}}</td>
            <td>{{ \Carbon\Carbon::parse($invoices->due_date)->format('d/m/Y H:i') }}</td>
            <td>{{$invoices->notes}}</td>
            <td>
                <a href={{ route('invoices.index') }} class="btn btn-success"> <i class="fa-solid fa-home"></i></a>
                
            </td>
        </tr>
  
  </tbody>
</table>
</div>
        </div>
    </div>
</div>
@endsection