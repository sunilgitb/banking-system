<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('customer.transactions');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function showTransactions()
    {
        $user = auth()->user();

        return view('dashboard', ['user' => $user]);
    }

    // public function deposit(Request $request)
    // {
    //     $user = auth()->user();
    //     $account = $user->account;
    //     $amount = $request->input('amount');

    //     // Update the account balance
    //     $account->balance += $amount;
    //     $account->save();

    //     return redirect()->route('customer.withdraw')->with('success', 'Deposit successful!');
    // }
    public function deposit(Request $request)
    {
        $user = Auth::user();
        $account = $user->account;
        $amount = $request->input('amount');

        // Update the account balance
        $account = new Account;
        $account->user_id = $user->id;
        $account->balance += $amount;
        $account->save();

        return redirect()->route('customer.withdraw')->with('success', 'Deposit successful!');
    }



    public function withdraw(Request $request)
    {
        $user = auth()->user();
        $account = $user->account;
        $amount = $request->input('amount');

        if ($account->balance < $amount) {
            return redirect()->route('customer.withdraw')->with('error', 'Insufficient funds!');
        }

        $account->balance -= $amount;
        $account->save();

        return redirect()->route('customer.withdraw')->with('success', 'Withdrawal successful!');
    }
}
