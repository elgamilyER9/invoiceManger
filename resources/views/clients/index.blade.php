@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                @if (session('clients'))
                <h4 class=" text-center alert alert-success">{{ session('clients') }}
                    
                </h4>
                    
                @endif
  <div class="card-header ">
    
    {{ __("CLIENTS") }} <span class="btn btn-outline-secondary">{{ $clients->count() }}</span>
    <span> <a href={{route('clients.create') }} class="btn btn-success" ><i class="bi bi-person-lines-fill"></i></a></span>
  </div>
  <table class="table text-center align-middle">
  <thead>
    <tr>
      <th scope="col">{{ __("ID") }}</th>
      <th scope="col">{{ __("Name") }}</th>
      <th scope="col">{{ __("User_id") }}</th>
      <th scope="col">{{ __("Email") }}</th>
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $item )
        <tr>
        
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->user_id}}</td>
            <td>{{$item->email}}</td>
            <td>
                <a href={{ route('clients.show',$item->id) }} class="btn btn-success"> <i class="fa-solid fa-eye"></i></a>
                <a href={{ route('clients.edit',$item->id) }}  class="btn btn-primary text-light"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href={{ route('clients.delete',$item->id) }} class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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