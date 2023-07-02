<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getTransactions(Request $request)
    {
        $user = Auth::user();
        $transactions = $user->transactions()->get();

        return response()->json(['transactions' => $transactions]);
    }

    public function deposit(Request $request)
    {
        return 1;
        $user = Auth::user();
        $account = $user->account;

        $amount = $request->input('amount');
        $account = new Account;
        $account->user_id = auth()->user()->id;
        $account->balance += $amount;
        $account->save();

        return response()->json(['message' => 'Deposit successful']);
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $account = $user->account;

        $amount = $request->input('amount');

        if ($amount > $account->balance) {
            return response()->json(['error' => 'Insufficient Funds'], 400);
        }

        $account->balance -= $amount;
        $account->save();

        return response()->json(['message' => 'Withdrawal successful']);
    }

    public function getAccounts(Request $request)
    {
        $this->authorize('isBanker');

        $accounts = Account::all();

        return response()->json(['accounts' => $accounts]);
    }

    public function getAccountTransactions(Request $request, $id)
    {
        $this->authorize('isBanker');

        $account = Account::findOrFail($id);
        $transactions = $account->user->transactions()->get();

        return response()->json(['transactions' => $transactions]);
    }
}
