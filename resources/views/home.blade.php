@extends('layouts.app')
@section('content')
<style>
  body {
    background: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
  }

  a {
    text-decoration: none;
  }

  a:hover {
    text-decoration: none;
  }

  /* Content */
  .content {
    margin-left: 0;
    padding: 25px;
  }

  /* Cards */
  .dashboard-card {
    border: none;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    color: #fff;
    text-align: center;
    transition: 0.3s;
  }

  .dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
  }

  .dashboard-card i {
    font-size: 30px;
    margin-bottom: 10px;
    display: block;
    color: #fff;
  text-align: center;
  margin: auto;
  }

  .bg-gradient-primary { background: linear-gradient(135deg, #4e54c8, #8f94fb); }
  .bg-gradient-success { background: linear-gradient(135deg, #11998e, #38ef7d); }
  .bg-gradient-warning { background: linear-gradient(135deg, #f7971e, #ffd200); color: #222; }
  .bg-gradient-danger  { background: linear-gradient(135deg, #ff512f, #dd2476); }
  .bg-orderitems {
    background: linear-gradient(135deg, #006d77, #0096a7, #83c5be);
  }

  h5, h3 {
    margin: 0;
    color: #fff;
  }

  .row > div a {
    display: block;
  }
</style>

<div class="content">
  <div class="container text-center m-auto">
    <div class="row g-4 mb-4">

      <div class="col-md-3">
        <a href="{{ route('users.index') }}">
          <div class="dashboard-card bg-gradient-primary">
            <i class="bi bi-person-circle"></i>
            <h5>Users</h5>
            <h3>{{ $users->count()}}</h3>
          </div>
        </a>
      </div>

      <div class="col-md-3">
        <a href="{{ route('clients.index') }}">
          <div class="dashboard-card bg-gradient-success">
            <i class="bi bi-people"></i>
            <h5>Clients</h5>
            <h3>{{ $clients->count() }}</h3>
          </div>
        </a>
      </div>

      <div class="col-md-3">
        <a href="{{ route('invoices.index') }}">
          <div class="dashboard-card bg-gradient-warning">
            <i class="bi bi-receipt"></i>
            <h5>Invoices</h5>
            <h3>{{$invoices->count()}}</h3>
          </div>
        </a>
      </div>

      <div class="col-md-3">
        <a href="{{ route('invoiceItems.index') }}">
          <div class="dashboard-card bg-gradient-danger">
            <i class="bi bi-collection"></i>
            <h5>InvoiceItems</h5>
            <h3>{{ $invoiceItems->count() }}</h3>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection
