<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: blue;
            color: white;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            border: 1px solid white;
            padding: 8px;
        }
    </style>
</head>

<body>


    <div class="p-6 bg-white border-b border-gray-200">
        <h2>Hello {{ Auth::user()->name }}</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="cursor: pointer">Logout</button>
        </form>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Customer Transaction Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allusers as $transaction)
            @if ($transaction->usertype != 'admin')
            <tr>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->email }}</td>
                <td><a href="{{ route('banker.user.transactions', ['userId' => $transaction->id]) }}" style="color:white;">View
                        Transactions</a></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
