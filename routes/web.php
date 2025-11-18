
<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



Auth::routes();
Route::get('/', function () {
    return view('welcome');
})->name("welcome");


Route::group(["middleware"=>"CheckAdmin"] ,function(){


    Route::get('/home',[HomeController::class,"index"] )->name('home');    
    
///////////User/////////
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
////////////Client/////////

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
///////////Invoice////////////
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/show/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/delete/{id}', [InvoiceController::class, 'delete'])->name('invoices.delete');
Route::get('/invoices/edit/{id}', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::post('/invoices/update', [InvoiceController::class, 'update'])->name('invoices.update');
//////////PDF//////////////////
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'generatePDF'])->name('invoices.pdf');

//////////InvoiceItems////////////
Route::get('/invoiceItems', [InvoiceItemController::class, 'index'])->name('invoiceItems.index');
Route::get('/invoiceItems/show/{id}', [InvoiceItemController::class, 'show'])->name('invoiceItems.show');
Route::get('/invoiceItems/create', [InvoiceItemController::class, 'create'])->name('invoiceItems.create');
Route::post('/invoiceItems/store', [InvoiceItemController::class, 'store'])->name('invoiceItems.store');
Route::get('/invoiceItems/delete/{id}', [InvoiceItemController::class, 'delete'])->name('invoiceItems.delete');
Route::get('/invoiceItems/edit/{id}', [InvoiceItemController::class, 'edit'])->name('invoiceItems.edit');
Route::post('/invoiceItems/update', [InvoiceItemController::class, 'update'])->name('invoiceItems.update');
Route::get('/home', [HomeController::class, 'index'])->name('home');
});


