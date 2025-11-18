<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $clients = Client::all();
       return view('clients.index', compact('clients'));
    }

  
    public function show($id)
    {
        $clients = Client::find($id);

        if (!$clients) {
            return redirect()->route('clients.index')->with("clients", "Client not found.");
        }

        return view("clients.show", ["clients" => $clients]);
    }
public function create()
    {
        $users = User::select('id','name')->get();

        return view("clients.create" , compact('users'));
    }
 public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:clients|max:255',
            'user_id'  => 'required|exists:users,id',
            'name'  => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Client::create([
            "id"=> $request->id,
            "user_id"=> $request->user_id,
            "name"=> $request->name,
            "email"=> $request->email,
            "phone" => $request->phone, 
            "address" => $request->address,
            
        ]);

        return redirect()->route('clients.index')->with("clients", "Created Successfully");
    }
     public function delete($id)
    {
        $clients = Client::find($id);

        if (!$clients) {
            return redirect()->route('clients.index')->with("clients", "User not found.");
        }

        $clients->delete();

        return redirect()->route('clients.index')->with("clients", "Deleted Successfully");
    }
   public function edit($id){
        $clients = Client::find($id);
        return view("clients.edit" , ["clients" => $clients , 'users' => User::select('id','name')->get()]);
        
    }
   public function update(Request $request)
{
    $old_id = $request->old_id;
    $clients = Client::findOrFail($old_id);

    $request->validate([
        'id' => ['required', Rule::unique('clients')->ignore($old_id)],
        'user_id' => 'required|exists:users,id',
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $clients->update([
        'id' => $request->id,
        'name' => $request->name,
        'user_id' => $request->user_id,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);
        return redirect()->route('clients.index')->with('clients' ,'Updated Successfully');
    }
}
