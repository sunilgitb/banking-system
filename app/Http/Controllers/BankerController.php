<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;
use Carbon\Carbon;
use DateTimeZone;

class BankerController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        $CustomersTransactions = Account::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $CustomersTransactions->transform(function ($transaction) {
            $transaction->created_at = Carbon::parse($transaction->created_at)->setTimezone(new DateTimeZone('Asia/Kolkata'));
            return $transaction;
        });
        $transactions = User::with('account')->where('id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $transactions->transform(function ($transaction) {
            $transaction->created_at = Carbon::parse($transaction->created_at)->setTimezone(new DateTimeZone('Asia/Kolkata'));
            return $transaction;
        });
        // dd($transactions);
        // Calculate the total balance

        // $totalBalance = User::join('accounts', 'users.id', '=', 'accounts.user_id')
        //     ->sum('accounts.balance');
        $currentUserId = auth()->user()->id;

        $totalBalance = User::join('accounts', 'users.id', '=', 'accounts.user_id')
            ->where('users.id', $currentUserId)
            ->sum('accounts.balance');
        $totalBalance = $totalBalance ?: "0.00";
        // $transactions = $user->transactions;
        $usersWithTotalTransactions = User::withCount('transactions')->get();

        // Show customer transactions for bankeer
        $allusers = User::all();
        $account = $user->account;
        // $alltransactions = $account->transactions()->orderBy('created_at', 'desc')->get();


        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
        }

        if ($usertype == 'admin') {
            return view('banker.dashboard', [
                'account' => $account,
                'totalBalance' => $totalBalance,
                'allusers' => $allusers,
                'usersWithTotalTransactions' => $usersWithTotalTransactions,
            ]);
        } elseif ($usertype == 'user') {
            return view('customer.dashboard', [
                'user' => $user,
                'CustomersTransactions' => $CustomersTransactions,
                'transactions' => $transactions,
                'totalBalance' => $totalBalance,
                'usersWithTotalTransactions' => $usersWithTotalTransactions,
                // 'transactions' => $transactions,

            ]);
        }
    }

    public function userTransactions($userId)
    {
        $user = User::findOrFail($userId);
        $transactions = $user->accounts()->orderBy('created_at', 'desc')->get();
        $transactions->transform(function ($transaction) {
            $transaction->created_at = Carbon::parse($transaction->created_at)->setTimezone(new DateTimeZone('Asia/Kolkata'));
            return $transaction;
        });
        $totalBalance = $user->accounts()->sum('balance');
        $totalBalance = $totalBalance ?: "0.00";

        return view('banker.user_transactions', compact('user', 'transactions', 'totalBalance'));
    }
}
