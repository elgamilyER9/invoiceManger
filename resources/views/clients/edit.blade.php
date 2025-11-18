@extends('layouts.app')
 @section('content')
<title>Dashboard</title>

    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form  enctype="multipart/form-data" action={{ route('clients.update', $clients->id) }} method="POST"  >
                    @csrf <input type="hidden" name="old_id" value={{ $clients->id }}> 
                    
                    <label for="id">{{ __("ID") }}</label> 
                    <input value={{ $clients->id }} type="text"
                        id="id" name="id" class="form-control mb-2"> @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
 @enderror
                        <label for="user_id">{{ __("User_id") }}</label> 
                         <select name="user_id" class="form-control">
    <option value="">-- Select User --</option>

    @foreach($users as $user)
        <option value="{{ $user->id }}"
            {{ old('user_id', $clients->user_id) == $user->id ? 'selected' : '' }}>
            {{ $user->name }} (ID: {{ $user->id }})
        </option>
    @endforeach
</select>

                        <label for="name">{{ __("Name") }}</label> 
                        <input value={{ $clients->name }} type="text"
                            id="name" name="name" class="form-control mb-2"> @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        <label for="email">{{ __("Email") }}</label> 
                        <input value={{ $clients->email }} type="text"
                            id="email" name="email" class="form-control mb-2"> @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                        
                                            <label for="phone">{{ __("phone") }}</label> <input type="text"
                                                value="{{$clients->phone}}" id="phone" name="phone"
                                                class="form-control mb-2"> @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
            
                    <label for="address">{{ __("address") }}</label> 
                    <input value="{{ $clients->address }}" type="text"
                        id="address" name="address" class="form-control mb-2"> @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    
                     

                    <input type="submit" value="{{ __("Updata") }}" class="btn btn-success w-100">
                </form>
          
        </div>
    </div>
</div>
@endsection
