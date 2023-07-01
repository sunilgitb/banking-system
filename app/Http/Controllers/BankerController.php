<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;

class BankController extends Controller
{
    public function showLoginForm()
    {
        return view('banker.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('banker')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('banker.accounts');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showAccounts()
    {
        $accounts = Account::with('user')->get();

        return view('banker.accounts', ['accounts' => $accounts]);
    }

    public function showTransactions(User $user)
    {
        $account = $user->account;
        $transactions = $account->transactions()->orderBy('created_at', 'desc')->get();

        return view('banker.dashboard', ['user' => $user, 'transactions' => $transactions]);
    }
}
