@extends('layouts.app')
 @section('content')
<title>Dashboard</title>

    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form  enctype="multipart/form-data" action={{ route('users.update', $users->id) }} method="POST"  >
                    @csrf <input type="hidden" name="old_id" value={{ $users->id }}> 
                    
                    <label for="id">{{ __("ID") }}</label> 
                    <input value={{ $users->id }} type="text"
                        id="id" name="id" class="form-control mb-2"> @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    <label for="name">{{ __("Name") }}</label> <input value={{ $users->name }} type="text"
                        id="name" name="name" class="form-control mb-2"> @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    <label for="email">{{ __("Email") }}</label> 
                    <input value="{{ $users->email }}" type="text"
                        id="email" name="email" class="form-control mb-2"> @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    <label for="password">{{ __("Password") }}</label> <input type="text"
                        value="{{ $users->password }}" id="password" name="password"
                        class="form-control mb-2"> @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                     <label for="role">{{ __("Role") }}</label>
                      <select class="form-control mb-4" name="role"
                        id="role">
                        @if ($users->role == "admin")
                            <option value="user">{{ __("User") }}</option>
                            <option selected value="admin">{{ __("Admin") }}</option>
                        @else
                            <option selected value="user">{{ __("User") }}</option>
                            <option  value="admin">{{ __("Admin") }}</option>
                        @endif
                      </select>
                    

                    <input type="submit" value="{{ __("Updata") }}" class="btn btn-success w-100">
                </form>
          
        </div>
    </div>
</div>
@endsection
