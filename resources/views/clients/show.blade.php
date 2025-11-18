@extends('layouts.app')
@section('content')
<div class="container mt-4 pt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
  <div class="card-header">
    {{ __("Client Details") }} <span class="btn btn-success">{{$clients->id}}</span>
  </div>
  <table class="table text-center align-middle ">
  <thead>
    <tr>
      <th scope="col">{{ __("ID") }}</th>
      <th scope="col">{{ __("Name") }}</th>
      <th scope="col">{{ __("User_id") }}</th>
      <th scope="col">{{ __("Email") }}</th>
      <th scope="col">{{ __("Phone") }}</th>
      <th scope="col">{{ __("Address") }}</th>
     
      
      <th scope="col">{{ __("Operation") }}</th>
    </tr>
  </thead>
  <tbody>
   
        <tr>
        
            <td>{{$clients->id}}</td>
            <td>{{$clients->name}}</td>
            <td>{{$clients->user_id}}</td>
            <td>{{$clients->email}}</td>
            <td>{{$clients->phone}}</td>
            <td>{{$clients->address}}</td>
            <td>
                <a href={{ route('clients.index') }} class="btn btn-success"> <i class="fa-solid fa-home"></i></a>
                
            </td>
        </tr>
  
  </tbody>
</table>
</div>
        </div>
    </div>
</div>
@endsection