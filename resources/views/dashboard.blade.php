{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Transactions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .balance-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="p-6 bg-white border-b border-gray-200">
       <h2>Hello {{ Auth::user()->name }}</h2>
    </div>
    <div class="container">
        <div class="balance-container">
            <h3>Total Balance: </h3>
        </div>


        <!-- Deposit Popup -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#depositModal">Deposit</button>
        <div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="depositModalLabel">Deposit Funds</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('customer.deposit')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="depositAmount">Amount:</label>
                                <input type="number" name="amount" id="depositAmount" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Deposit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdrawal Popup -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#withdrawModal">Withdraw</button>
        <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="withdrawModalLabel">Withdraw Funds</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="withdrawAmount">Amount:</label>
                                <input type="number" name="amount" id="withdrawAmount" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Withdraw</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Display transaction records -->
    <h1>Transaction Records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            {{--  @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach  --}}
        </tbody>
    </table>
    <div class="p-6 bg-white border-b border-gray-200">
        <h2>Hello {{ Auth::user()->name }}</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>
