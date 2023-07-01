<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Registration Form</title>

    <style>
        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Login as Banker</h4>
                        <p class="text-center">Get started as a banker</p>
                       <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Password" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div> <!-- form-group// -->
                    </form>
                    </article>
                </div> <!-- card.// -->
            </div>
            <div class="col-md-6">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Register as Customer</h4>
                        <p class="text-center">Get started as a customer</p>
                       <form method="POST" action="{{ route('register') }}" id="">
                        @csrf

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" class="form-control" placeholder="Enter name" type="text">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Password" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password_confirmation" class="form-control" placeholder="Confirm Password" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register as Customer</button>
                        </div> <!-- form-group// -->
                    </form>
                    <h4>OR Login Here</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Password" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div> <!-- form-group// -->
                    </form>
                    </article>
                </div> <!-- card.// -->
            </div>
        </div>




        {{-- <div class="row">
            <div class="col-md-12">
                <h4>Registered Bankers</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody id="bankerTableBody">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Registered Customers</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody id="customerTableBody">
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>

    <script>
        // Banker registration form submission
    $("#bankerForm").submit(function(event) {
      event.preventDefault();

      var email = $("input[name='bankerEmail']").val();
      var password = $("input[name='bankerPassword']").val();

      appendBankerRow(email, password);

      // Reset form fields
      $(this)[0].reset();
    });

    // Customer registration form submission
    $("#customerForm").submit(function(event) {
      event.preventDefault();

      var email = $("input[name='customerEmail']").val();
      var password = $("input[name='customerPassword']").val();

      appendCustomerRow(email, password);

      // Reset form fields
      $(this)[0].reset();
    });

    // Function to append a new row to the banker table
    function appendBankerRow(email, password) {
      var newRow = "<tr><td>" + email + "</td><td>" + password + "</td></tr>";
      $("#bankerTableBody").append(newRow);
    }

    // Function to append a new row to the customer table
    function appendCustomerRow(email, password) {
      var newRow = "<tr><td>" + email + "</td><td>" + password + "</td></tr>";
      $("#customerTableBody").append(newRow);
    }
    </script>

</body>

</html>
