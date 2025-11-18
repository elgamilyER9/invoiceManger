@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
  <div class="card-header">
    {{ __("InvoiceItem Details") }} <span class="btn btn-success">{{$invoiceItems->id}}</span>
  </div>
  <table class="table text-center align-middle ">
  <thead>
    <tr>
       <tr>
      <th scope="col">{{ __("ID") }}</th>
      <th scope="col">Invoice_id</th>
      <th scope="col">{{ __("Quantity") }}</th>
      <th scope="col">{{ __("Price") }}</th>
      <th scope="col">{{ __("Total") }}</th>
      <th scope="col">{{ __("Description") }}</th>
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
      
     
  </thead>
  <tbody>
   
        <tr>
        
            <td>{{$invoiceItems->id}}</td>
            <td>{{$invoiceItems->invoice_id}}</td>
            <td>{{$invoiceItems->quantity}}</td>
            <td>{{$invoiceItems->price}}</td>
            <td>{{$invoiceItems->total}}</td>
            <td>{{$invoiceItems->description}}</td>
           
            <td>
                <a href={{ route('invoiceItems.index') }} class="btn btn-success"> <i class="fa-solid fa-home"></i></a>
                
            </td>
        </tr>
  
  </tbody>
</table>
</div>
        </div>
    </div>
</div>
@endsection