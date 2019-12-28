@extends('layouts.app')
@section('content')
    <div class="container" id="account" >
        <div class="row">
            <div class="col-md-4">
                <div class="jumbotron">
                    <h3>Diposit</h3>
                    <hr>
                    <div class="container-fluid">
                        <form class="form" action="/account/diposit" method="POST">
                            @if(isset($error_id) && $error_id == 0)
                                @if($error )
                                    <div class="alart alert-danger">{{$status}}</div>
                                @else
                                    <div class="alart alert-success">{{$status}}</div> 
                                @endif
                            @endif
                            {!!csrf_field()!!}
                            <div class="form-group"> 
                                <label for="account">Account</label> 
                                <input type="number" name="account_number" class="form-control" required/>
                            </div>
                            <div class="form-group"> 
                                <label for="amount">Amount</label> 
                                <input type="number" name="amount" class="form-control" max={!!$data[0]!!} min="1" required/>
                            </div>
                            <div class="from-group">
                                <input type="submit" name='diposit' class="pull-right btn btn-primary" value="Diposit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <h3>Withdrowals</h3>
                    <hr>
                    <div class="container-fluid">
                        <form class="form" action="/account/withdrow" method="POST">
                            @if(isset($error_id) && $error_id == 1)
                                @if($error )
                                    <div class="alart alert-danger">{{$status}}</div>
                                @else
                                    <div class="alart alert-success">{{$status}}</div> 
                                @endif
                            @endif
                            {!!csrf_field()!!}
                            <div class="form-group"> 
                                <label for='account_number'>Account</label>
                                <select name='account_number' class="form-control" required>
                                    
                                    @forelse($data[1] as $account)
                                        <option value="{{$account->account_number}}">{{$account->account_number}}</option>
                                    @empty
                                        <option value="">You have no counts</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='amount'>Amount</label>
                                <input type="number" name="amount" class="form-control" min=1 required/>
                            </div> 
                            <div class='form-group'> 
                                <input type="submit" name='withdrow' value="Withdrow" class="pull-right btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <h3>Transfer</h3>
                    <hr>
                    <div class='container-fluid'>
                        <form class="form" action="/account/transfer" method="POST">
                            @if(isset($error_id) && $error_id == 2)
                                @if($error )
                                    <div class="alart alert-danger">{{$status}}</div>
                                @else
                                    <div class="alart alert-success">{{$status}}</div> 
                                @endif
                            @endif
                            {!!csrf_field()!!}
                            <div class="form-group"> 
                                <label for="from">From</label>
                                <select name='from' class="form-control" required>
                                   @forelse($data[1] as $account)
                                        <option value="{{$account->account_number}}">{{$account->account_number}}</option>
                                    @empty
                                        <option value="">You have no counts</option>
                                    @endforelse
                                </select> 
                            </div>
                            <div class="form-group"> 
                                <label for="to">To</label>
                                <input type="number" name="to" class="form-control" required>
                            </div>
                            <div class="form-group"> 
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control"  min=1 required>
                            </div>
                            <div class="form-group"> 
                                <input type="submit" name="transfer" class="btn btn-primary pull-right" /> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8" style="margin-top: -3%;possition:relative"> 
                    <div class="jumbotron" id="accounts-list">
                        <h3>Accounts</h3>
                        <hr>
                        @if(isset($error_id))
                                @if($status == 'account_created')
                                    <div class="alart alert-success">You have successfully created a new account money!<br>Your account number is <b>{{$account_number}}    </b></div> 
                                @endif
                            @endif
                        <ul class="list-group" > 

                            @forelse($data[1] as $account)
                                <li><b>{{$account->account_number}}</b><b class="label pull-right">{{$account->balance}}</b><br><i class="small">{{$account->type}}</i></li>
                            @empty
                                <p class="text-center text-danger">You have no counts</p>
                            @endforelse
                        </ul>
                        <center><a href="/account/create"/>Create new Account</a></center>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="jumbotron">
                        <h3>Walet money</h3>
                        <hr>
                        <center>
                            <h2>{!!$data[0]!!}</h2>
                           <a href="/play game"> <i class="btn btn-link">Play game to earn money</i></a>
                        </center>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection