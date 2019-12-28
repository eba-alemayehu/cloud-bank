@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron">
                <h3>Recent transactions</h3>
                <div class="responsive-table">
                    <table class="table">
                        <tr>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Account</th>
                        </tr>
                        @forelse($tansactions as $transaction)
                            <tr>
                                <td>{!!($transaction->type == 3)?"<i class='fa fa-arrow-down'></i>":"<i class='fa fa-send'></i>"!!}</td>
                                <td>{{($transaction->type == 3)?"-".$transaction->amount:"+".$transaction->amount}}</td>
                                <td>{{($transaction->account_number)?$transaction->account_number:"No account"}}</td>
                            </tr>
                        @empty
                            <p class="text-danger lead">There is no transactions!</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item"><b>Walet money <span class="label  pull-right">{{Auth::user()->walet_money}}</span></b></li>
                    @forelse($accounts as $account)
                        <li class="list-group-item"><b>{{$account->account_number}}<span class="label  pull-right">{{$account->balance}}</span></b></li>
                    @empty
                        <p class='text-danger text-center'>No Accounts</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
