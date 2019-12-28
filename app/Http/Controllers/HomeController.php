<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transactions;
use App\Regular_transaction;
use App\Account; 

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Regular_transaction::where('customer_id',Auth::id())->get();

        foreach($transactions as $t){
            $tans = Transactions::where('id', $t->transaction_id)->first(); 
            $t->amount = $tans->amount; 
            $t->type = $tans->transaction_type_id;
        }
        $accounts = Account::where("customer_id", Auth::id())->get();
        return view('home')
                ->with('tansactions', $transactions)
                ->with('accounts', $accounts);
    }
}
