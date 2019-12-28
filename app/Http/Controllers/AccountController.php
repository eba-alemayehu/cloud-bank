<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use App\Transactions;
use App\Regular_transaction; 
use App\Account;
use App\Account_type;

class AccountController extends Controller
{
    public function feed(){
        $walet = Auth::user()->walet_money;
        $accounts = Account::where('customer_id', Auth::user()->id)->get();
        $filtered_accouts = [];
        foreach($accounts as $account){
            $account->type = Account_type::where('id', $account->account_type_id)->first()->name; 
        }
        return [$walet, $accounts];
    }
    public function updateBalance($amount,$account_number){
        $newBalace = Account::where('account_number', $account_number)->first()->balance + $amount;
        $account = Account::where('account_number', $account_number)->update(['balance'=>$newBalace]);
        $user = Auth::user();
        $user->walet_money -= $amount; 
        $user->save();
    }
    public function index()
    {
        return view('account')
                ->with('data', $this->feed()); 
    }
    public function transaction($amount,$transaction_type, $account = null){
        $transaction = Transactions::create([
            'amount' => $amount,
            'transaction_type_id' => $transaction_type
        ]);
        
        Regular_transaction::create([
            "customer_id" => Auth::id(),
            'transaction_id' => $transaction->id,
            'account_number' => $account
        ]);

        $amount = ($transaction_type == 3)?$transaction->amount:-1*$transaction->amount; 

        $this->updateBalance($amount, $account); 
    }
    public function _transaction($amount,$transaction_type, $id,  $account = null){
        $transaction = Transactions::create([
            'amount' => $amount,
            'transaction_type_id' => $transaction_type
        ]);
        
        Regular_transaction::create([
            "customer_id" =>  $id,
            'transaction_id' => $transaction->id,
            'account_number' => $account
        ]);

        $amount = ($transaction_type == 3)?$transaction->amount:-1*$transaction->amount; 

        $this->updateBalance($amount, $account); 
    }
   
    public function diposit(Request $request){
        $status = '';
        if(count(Account::where("account_number", $request->account_number)->get()) == 0)
            $status = "Account dosen't exitst. ";
        if($request->amount > $this->feed()[0])
            $status .=  "You don't have enough mony in walet.";
        if($status != '')
            return view('account')
                    ->with('error',1)
                    ->with('error_id',0)
                    ->with('status',$status)    
                    ->with('data', $this->feed());
      
        $this->transaction($request->amount, 3,$request->account_number); 
        return view('account')
                ->with('error',0)
                ->with('error_id',0)
                ->with('status','You have disposited successfully')
                ->with('data', $this->feed());
    }
    public function withdrow(Request $request){
        $status = '';
        if(count(Account::where("account_number", $request->account_number)->get()) == 0)
            $status = "Account dosen't exitst. ";
        if($request->amount > Account::where("account_number",$request->account_number)->first()->balance)
            $status .=  "You don't have enough mony in account.";
        if($status != '')
            return view('account')
                    ->with('error',1)
                    ->with('error_id',1)
                    ->with('status',$status)    
                    ->with('data', $this->feed());

        $this->transaction($request->amount, 1, $request->account_number); 
        return view('account')
                ->with('walet', $this->feed()[0])
                ->with('accounts', $this->feed()[1])
                ->with('error',0)
                ->with('error_id',1)
                ->with('status','withdrow')
                ->with('data', $this->feed());
    }
    public function transfer(Request $request){
        $this->transaction($request->amount, 3, $request->to);  
        $this->transaction($request->amount, 1, $request->from);
        return view('account')
                ->with('walet', $this->feed()[0])
                ->with('accounts', $this->feed()[1])
                ->with('error',0)
                ->with('error_id',2)
                ->with('status','tansfer')
                ->with('data', $this->feed());;
    }

    public function create()
    {        
        return view("createAccout")
                    ->with("account_types", Account_type::get());
    }
   
    public function store(Request $request)
    {
        $newAccount = Account::create([
            'balance'=> 0,
            'account_type_id'=> $request->type,
            'customer_id'=>Auth::user()->id
        ]);
        $this->updateBalance($request->intital_balance,$newAccount->id);
        if($request->to_payment=='true'){
            $payment_service = new PaymentController(); 
            return redirect('/payment');
                    // ->with("success" , [1,"Merchant accout is created! Now you can create payment"])
                    // ->with("merchantAccounts", $payment_service->merchantAccounts());
        }else
            return view('account')
                        ->with('data', $this->feed())
                        ->with('status','account_created')
                        ->with('account_number',$newAccount->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
