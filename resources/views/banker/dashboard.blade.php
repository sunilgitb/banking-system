<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello Admin</h1>


    <div class="p-6 bg-white border-b border-gray-200">
        <h2>Hello {{ Auth::user()->name }}</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>ID</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allusers as $transaction)
            <tr>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>ID</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersWithTotalTransactions as $transaction)
            <tr>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
