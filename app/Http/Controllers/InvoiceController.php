<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
       return view('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoices = Invoice::find($id);

        if (!$invoices) {
            return redirect()->route('invoices.index')->with("invoices", "Client not found.");
        }

        return view("invoices.show", ["invoices" => $invoices]);
    }
    public function create()
    {
        $users = User::select('id','name')->get();
        $clients = Client::select('id','name')->get();
        return view("invoices.create" , compact('users','clients'));
    }
   public function store(Request $request)
{
    $request->validate([
        'id' => 'required|integer|unique:invoices',
        'user_id' => 'required|exists:users,id',
        'client_id' => 'required|exists:clients,id',
        'invoice_number' => 'required|string|unique:invoices,invoice_number',
        'total_amount' => 'required|numeric',
        'invoice_date' => 'required|date',
        'due_date' => 'nullable|date',
        'notes' => 'nullable|string',
    ]);

    Invoice::create($request->only([
        'id', 'user_id', 'client_id', 'invoice_number',
        'invoice_date', 'due_date', 'total_amount', 'notes'
    ]));

    return redirect()->route('invoices.index')->with('invoices', 'Invoice Created Successfully');
}

     public function delete($id)
    {
        $invoices = Invoice::find($id);

        if (!$invoices) {
            return redirect()->route('invoices.index')->with("invoices", "User not found.");
        }

        $invoices->delete();

        return redirect()->route('invoices.index')->with("invoices", "Deleted Successfully");
    }
     public function edit($id){
        $invoices = Invoice::find($id);
        return view("invoices.edit" , ["invoices" => $invoices , 'users' => User::select('id','name')->get() , 'clients' => Client::select('id','name')->get()]);
        
    }
    public function update(Request $request)
{
    $old_id = $request->old_id;
    $invoice = Invoice::findOrFail($old_id);

    $request->validate([
        'id' => [
            'required',
            Rule::unique('invoices')->ignore($old_id),
        ],
        'user_id' => 'required|exists:users,id',
        'client_id' => 'required|exists:clients,id',
        'invoice_number' => [
            'required',
            Rule::unique('invoices')->ignore($old_id),
        ],
        'total_amount' => 'required|numeric',
        'invoice_date' => 'required|date',
        'due_date' => 'nullable|date',
        'notes' => 'nullable|string',
    ]);

    $invoice->update([
        'id' => $request->id,
        'user_id' => $request->user_id,
        'client_id' => $request->client_id,
        'invoice_number' => $request->invoice_number,
        'invoice_date' => $request->invoice_date,
        'due_date' => $request->due_date,
        'total_amount' => $request->total_amount,
        'notes' => $request->notes,
    ]);

    return redirect()->route('invoices.index')->with('invoices', 'Invoice Updated Successfully');
}
public function generatePDF($id)
{
    $invoice = Invoice::with('invoiceitems', 'client')->findOrFail($id);

    $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));

        
    return $pdf->download('Invoice_'.$invoice->invoice_number.'.pdf');
}

}
