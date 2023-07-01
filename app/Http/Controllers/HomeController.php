<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;

class HomeController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        $transactions = User::with('account')->where('id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($transactions);
        // Calculate the total balance

        // $totalBalance = User::join('accounts', 'users.id', '=', 'accounts.user_id')
        //     ->sum('accounts.balance');
        $currentUserId = auth()->user()->id;

        $totalBalance = User::join('accounts', 'users.id', '=', 'accounts.user_id')
            ->where('users.id', $currentUserId)
            ->sum('accounts.balance');
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
                'allusers' => $allusers,
                'usersWithTotalTransactions' => $usersWithTotalTransactions,
            ]);
        } elseif ($usertype == 'user') {
            return view('customer.dashboard', [
                'user' => $user,
                'transactions' => $transactions,
                'totalBalance' => $totalBalance,
                'usersWithTotalTransactions' => $usersWithTotalTransactions,
                // 'transactions' => $transactions,

            ]);
        }
    }
}
