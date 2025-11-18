<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $clients = Client::all();
        $invoices = Invoice::all();
        $invoiceItems = InvoiceItem::all();
        return view('home', compact('users', 'clients','invoices','invoiceItems'));
    }
}
