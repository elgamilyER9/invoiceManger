@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                @if (session('invoices'))
                <h4 class=" text-center alert alert-success">{{ session('invoices') }}
                    
                </h4>
                    
                @endif
  <div class="card-header ">
    
    {{ __("invoices") }} <span class="btn btn-outline-secondary">{{$invoices->count()}}</span>
    <span> <a href={{route('invoices.create') }} class="btn btn-success" ><i class="bi bi-envelope-plus"></i></a></span>
  </div>
  <table class="table text-center align-middle">
  <thead>
    <tr>
      <th scope="col">{{ __("ID") }}</th>
      <th scope="col">{{ __("User_id") }}</th>
      <th scope="col">Client_id</th>
      <th scope="col">{{ __("Invoice_number") }}</th>
      <th scope="col">{{ __("Total_amount") }}</th>
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($invoices as $item )
        <tr>
        
            <td>{{$item->id}}</td>
            <td>{{$item->user_id}}</td>
            <td>{{$item->client_id}}</td>
            <td>{{$item->invoice_number}}</td>
            <td>{{ number_format($item->total_amount) }} L.E</td>

            <td>
                <a href={{ route('invoices.show',$item->id) }} class="btn btn-success"> <i class="fa-solid fa-eye"></i></a>
                <a href={{ route('invoices.edit',$item->id) }}  class="btn btn-primary text-light"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href={{ route('invoices.delete',$item->id) }} class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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