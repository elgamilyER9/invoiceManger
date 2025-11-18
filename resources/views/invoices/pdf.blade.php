<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        h3 { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Invoice #{{ $invoice->invoice_number }}</h2>
    <p><strong>Client:</strong> {{ $invoice->client->name ?? 'N/A' }}</p>
    <p><strong>Date:</strong> {{ $invoice->invoice_date }}</p>
    <p><strong>Due--Date:</strong> {{ $invoice->due_date }}</p>

    @php $total = 0; @endphp

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price (L.E)</th>
                <th>Total (L.E)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->invoiceitems as $item)
                @php
                    $itemTotal = $item->quantity * $item->price;
                    $total += $itemTotal;
                @endphp
                <tr>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="text-right">{{ number_format($itemTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-right">Total Amount: {{ number_format($total, 2) }} L.E</h3>
</body>
</html>
