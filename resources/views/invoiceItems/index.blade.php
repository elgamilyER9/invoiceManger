@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                @if (session('invoiceItems'))
                <h4 class=" text-center alert alert-success">{{ session('invoiceItems') }}
                    
                </h4>
                    
                @endif
  <div class="card-header ">
    
    {{ __("invoiceItems") }} <span class="btn btn-outline-secondary">{{$invoiceItems->count()}}</span>
    <span> <a href={{route('invoiceItems.create') }} class="btn btn-success" ><i class="bi bi-bag-plus"></i></a></span>
  </div>
  <table class="table text-center align-middle">
  <thead>
    <tr>
      <th scope="col">{{ __("ID") }}</th>
      <th scope="col">Invoice_id</th>
      <th scope="col">{{ __("Quantity") }}</th>
 
      <th scope="col">{{ __("Price") }}</th>
      <th scope="col">{{ __("Total") }}</th>
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($invoiceItems as $item )
        <tr>
        
            <td>{{$item->id}}</td>
            <td>{{$item->invoice_id}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}} L.E</td>
            <td>{{ number_format($item->total) }} L.E</td>

            <td>
                 <a href={{ route('invoiceItems.show',$item->id) }} class="btn btn-success"> <i class="fa-solid fa-eye"></i></a> 
                <a href={{ route('invoiceItems.edit',$item->id) }}  class="btn btn-primary text-light"><i class="fa-solid fa-pen-to-square"></i></a>
                 <a href={{ route('invoiceItems.delete',$item->id) }} class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> 
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
        </div>
    </div>
</div>
@endsection