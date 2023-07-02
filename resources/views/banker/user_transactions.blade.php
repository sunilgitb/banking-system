<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Transactions</title>
</head>
<body>
        <style>
            body {
                background-color: blue;
                color: white;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid white;
                padding: 8px;
            }
        </style>




        <h3>Customer Name : {{ $user->name }}</h3>
        <h3 class="mb-0">Available Balance: {{$totalBalance }}</h3>


        <table>
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_type }}</td>
                    <td>{{ $transaction->balance }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
