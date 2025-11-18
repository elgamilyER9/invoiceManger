@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            
            <form action=
            {{ route('clients.store')}} method="post" enctype="multipart/form-data">
                @csrf
<label for="id">{{ __("ID") }}</label>
<input type="number" name="id" class="form-control mb-3">
@error('id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<label for="user_id">user</label>
<select name="user_id" class="form-control mb-3">
    <option value="">-- Select User--</option>
    @foreach($users as $item)
        <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
            {{ $item->name }} (ID: {{ $item->id }})
        </option>
    @endforeach
</select>
<label for="name">{{ __("Name") }}</label>
<input type="text" name="name" class="form-control mb-3">
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<label for="email">{{ __("Email") }}</label>
<input type="email" name="email" class="form-control mb-3">
@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<label for="phone">Phone</label>
<input type="text" name="phone" class="form-control mb-3">
@error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<label for="address">Address</label>
<input type="text" name="address" class="form-control mb-3">
@error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<input type="submit" class="w-100 btn btn-success" value="{{ __("Create New Client") }}">
            </form>
        </div>
    </div>
</div>
@endsection