<!-- resources/views/banker/accounts.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Banker Accounts</title>
</head>

<body>
    <h2>Banker Accounts</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('banker.user.transactions', ['userId' => $user->id]) }}">View Transactions</a></td>
        </tr>
        @endforeach
    </table>
</body>

</html>
