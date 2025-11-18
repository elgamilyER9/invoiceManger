<?php

namespace App\Http\Controllers;


use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoiceItems = InvoiceItem::all();
       return view('invoiceItems.index', compact('invoiceItems'));
    }
 public function show($id)
    {
        $invoiceItems = InvoiceItem::find($id);

        if (!$invoiceItems) {
            return redirect()->route('invoiceItems.index')->with("invoiceItems", "InvoiceItem not found.");
        }

        return view("invoiceItems.show", ["invoiceItems" => $invoiceItems]);
    }
    public function create()
    {
        $invoices = Invoice::select('id')->get();

        return view("invoiceItems.create" , compact('invoices'));
    }
    public function store(Request $request)
{
    // Validation
    $request->validate([
        'id' => 'required|unique:invoice_items,id',
        'invoice_id' => 'required|exists:invoices,id',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
    ]);

    // 
    $total = $request->quantity * $request->price;

    // Create new invoice item
    InvoiceItem::create([
        'id'          => $request->id,
        'invoice_id'  => $request->invoice_id,
        'quantity'    => $request->quantity,
        'price'       => $request->price,
        'total'       => $total,
        'description' => $request->description,
    ]);

    return redirect()
        ->route('invoiceItems.index')
        ->with('invoiceItems', 'Invoice Item Created Successfully');
}

      public function delete($id)
    {
        $invoiceItems = InvoiceItem::find($id);

        if (!$invoiceItems) {
            return redirect()->route('invoiceItems.index')->with("invoiceItems", "User not found.");
        }

        $invoiceItems->delete();

        return redirect()->route('invoiceItems.index')->with("invoiceItems", "Deleted Successfully");
    }
     public function edit($id){
        $invoiceItems = InvoiceItem::find($id);
        return view("invoiceItems.edit" , ["invoiceItems" => $invoiceItems , 'invoices' => Invoice::select('id')->get()]);
        
    }
      public function update(Request $request)
{
    $old_id = $request->old_id;

    // Get invoice item or fail
    $invoiceItem = InvoiceItem::findOrFail($old_id);

    // Validation
    $request->validate([
        'id' => [
            'required',
            Rule::unique('invoice_items')->ignore($old_id), 
        ],
        'invoice_id' => 'required|exists:invoices,id',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
    ]);
 
    $total = $request->quantity * $request->price;

    // Update data
    $invoiceItem->update([
        'id' => $request->id,
        'invoice_id' => $request->invoice_id,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'total' => $total,
        'description' => $request->description,
    ]);

    return redirect()
        ->route('invoiceItems.index')
        ->with('invoiceItems', 'Invoice Item Updated Successfully');
}
}
