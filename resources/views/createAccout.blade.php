@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h3>Create accout</h3>
                    <hr>
                    <div class="container">
                        @if(isset($error))
                            <div class="alert alert-warning">
                                {{$error[1]}}
                            </div>
                        @endif
                        <form class="form" action="/account" method="POST">
                            {!!csrf_field()!!}
                            @if(isset($error))
                                @if($error[0] == 1)
                                    <input name="to_payment" hidden value="true"/>
                                @endif
                            @endif
                            <div class="form-group">
                                <label for=""></label>
                                <select class="form-control" name="type">   
                                    @forelse($account_types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @empty
                                        <option value="" class="text-danger">There is no account types</option></option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="initial_balace"></label>
                                <input type="number" name="intital_balance" class="form-control" placeholder="Initial balance" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="createAccout" class="btn btn-primary pull-right" value="Create Account" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection