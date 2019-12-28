<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Payment_services;
use App\Account_type;
class PaymentController extends Controller
{
    public function is_uinque_api_key($api_key){
        return Payment_services::where("API_key",$api_key)->first();
    }
    public function merchantAccounts(){
        return Account::where('customer_id',Auth::user()->id)->where('account_type_id',2)->get();
    }
    public function payment_services(){
        return Payment_services::where('customer_id',Auth::id())->first();
    }
    public function index()
    {
        $hasPayment = Auth::user()->payment;
        if(!$hasPayment){
            if(count($this->merchantAccounts()))
                return view("createPaymetService")
                        ->with("merchantAccounts", $this->merchantAccounts());
            else
                return redirect("/account/create");
                        // ->with("account_types", Account_type::get())
                        // ->with("error",[1, "You must have merchant account! Please create merchant account."]);
        }
        return view('payment')
                ->with('api_key', $this->payment_services()->API_key);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createPaymetService")
            ->with("merchantAccounts", $this->merchantAccounts());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_api_key = str_random(20);
        while($this->is_uinque_api_key($new_api_key)){
            $new_api_key = str_random(20); 
        }
        Payment_services::create([
            'busyness_phone' => $request->phone,
            'busyness_email' => $request->email,
            'busyness_region' => $request->region,
            'busyness_city' => $request->city,
            'busyness_zoon_or_subcity' => $request->subcity_or_zoon,
            'busyness_woreda' => $request->woreda,
            'website' => $request->website,
            'API_key' => $new_api_key,
            'listener_url' => $request->listener,
            'customer_id' => Auth::user()->id,
            'merchent_id' => $request->merhcant_id
        ]);
        return redirect("/payment"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
