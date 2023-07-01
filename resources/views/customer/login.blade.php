<h1>Customer Login</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('customer.login') }}" method="POST">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
