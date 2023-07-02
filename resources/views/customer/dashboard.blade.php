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

        .transaction-table {
            margin-top: 30px;
        }

        .dashboard-header {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .logout-button {
            margin-top: 20px;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .modal-title {
            font-weight: bold;
        }
    </style>
</head>

<body>



    <div class="text-center logout-button" style="float: right">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    </div>
    <div class="dashboard-header">
        <h2 class="text-center">Hello, {{ Auth::user()->name }}!</h2>
        @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="container">

        <div class="balance-container">
            <h3 class="mb-0">Available Balance:</h3>
            <h2>{{$totalBalance }}</h2>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <!-- Deposit Popup -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#depositModal">Deposit</button>
        <div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="depositModalLabel">Available Balance: {{$totalBalance }}</h5><br>

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
                        <h5 class="modal-title" id="withdrawModalLabel"><h5 class="modal-title" id="depositModalLabel">Available Balance: {{$totalBalance }}</h5><br></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('customer.withdraw') }}" method="POST">
                        @csrf
                            @csrf
                            <div class="form-group">
                                <label for="withdrawAmount">Amounts:</label>
                                <input type="number" name="amount" id="withdrawAmount" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Withdraw</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Records -->
        <div class="transaction-table">
            <h2 class="text-center table">Transaction Records</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($CustomersTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->transaction_type }}</td>
                        <td>{{ $transaction->balance }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <
    </div>

    <style>
        body {
            background-color: blue;
        }

        .table {
        color: white;
        }
        .transaction-table table {
        color: white;
        }

        .dashboard-header {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .balance-container {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .transaction-table {
            margin-top: 30px;
        }

        .logout-button {
            margin-top: 20px;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .modal-title {
            font-weight: bold;
        }
    </style>
</body>
<script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 2000);
</script>
</html>
