@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h3>Register For Payment Service</h3>
                    <hr>
                    <div class="container">
                        <form class="form" action="/payment" method="POST">
                            {!!csrf_field()!!}
                            @if(isset($success))
                                <div class="alert alert-success">
                                    {{$success[1]}}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="phone">Phone</label>
                                        <input type="tel" name="phone" class="form-control" />
                                    </div> 
                                    <div class="col-md-12">
                                        <label for="merchant_id">Merchant Account</label>
                                        <select name="merhcant_id" class="form-control">
                                            @forelse($merchantAccounts as $account)
                                                <option value="{{$account->account_number}}">{{$account->account_number}}</option>
                                            @empty
                                                <option value="" classs="text-danger">No Merchant Account</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <label for="address">Bussyness Address</label>
                                <div class="row">
                                    <div class=col-md-6>
                                        <select name="region" placeholder="Region" class="form-control" placehoder="region" required > 
                                            <option value=1 >Amhara</option>
                                            <option value=2 >Tigraye</option>
                                            <option value=3 >Oromiya</option>
                                            <option value=4 >Afar</option>
                                            <option value=5 >Benishangule</option>
                                            <option value=6 >Gambela</option>
                                            <option value=7 >Adis Ababa</option>
                                            <option value=8 >Diredewa</option>
                                            <option value=9 >South peoples</option>
                                            <option value=10 >Somali</option>
                                            <option value=11 >Hareri</option>
                                        </select>
                                    </div>
                                    <div class=col-md-6>
                                        <input type="text" name="city" class="form-control" placeholder="City" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <input type="text" name="subcity_or_zoon" class="form-control" placeholder="Subcity or zon" />
                                    </div>
                                    <div class='col-md-6'>
                                        <input type="text" name="woreda" class="form-control" placeholder="woreda" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" name="website" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="listener">Listener URL</label>
                                <input type="url" name="listener" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right" value="Register"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection