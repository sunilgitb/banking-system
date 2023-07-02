<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;


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

    public function deposit(Request $request)
    {
        $user = Auth::user();
        $account = $user->account;
        $amount = $request->input('amount');

        // Update the account balance
        $account = new Account;
        $account->user_id = $user->id;
        $account->balance += $amount;
        $account->transaction_type = 'deposit';
        $account->save();
        return back()->with('success', 'Deposit successful!');
        // Session::flash('success', 'Deposit successful!');
    }

    // public function withdraw(Request $request)
    // {
    //     $user = Auth::user();
    //     $account = $user->account;
    //     $amount = $request->input('amount');

    //     if ($account->balance < $amount) {
    //         return redirect()->route('customer.withdraw')->with('error', 'Insufficient funds!');
    //     }

    //     $account->balance -= $amount;
    //     $account->save();

    //     return back()->with('success', 'Withdraw successful!');
    // }

    public function withdraw(Request $request)
    {
        $user = Auth::user();

        $amount = $request->input('amount');


        // Update the account balance
        $account = new Account;
        $account->user_id = $user->id;
        $account->balance -= $amount;
        $account->transaction_type = 'withdraw';
        $account->save();
        return back()->with('success', 'Withdraw successful!');
    }
}
