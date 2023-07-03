<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
</head>
<body>
    <h1>Invoices</h1>

    <form action="{{ route('invoices.index') }}" method="GET">
        <input type="text" name="customer_name" placeholder="Customer Name">
        <input type="text" name="salesperson" placeholder="Salesperson">
        <input type="text" name="photographer" placeholder="Photographer">
        <button type="submit">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Salesperson</th>
                <th>Photographer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->customer_name }}</td>
                    <td>{{ $invoice->salesperson }}</td>
                    <td>{{ $invoice->photographer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
