<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cloud Pay</title>
    <link rel="icon" href="/img/icon.ico"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <main class="container">
            <div class="row" style="margin-top: 5%">
                <div class="col-md-8 col-sm-offset-2 jumbotron">
                    <h3><img src="/img/icon.ico" class="img-rounded" style="width:50px; height:50px"/> Cloud Pay</h3>
                    <hr>
                    <div class='container-fluid'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="well">
                                    <h3>Invoice</h3>
                                    <hr>
                                    <ul style="list-style: none">
                                        <li><strong>Price: </strong>40</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="well">
                                    <h4>Enetr your cradtials</h4>
                                    <hr>
                                    <form class="form" method="POST" action="/pay-auth">
                                        {!!csrf_field()!!}
                                        <input type="text" name="price" value="{{$price}}" hidden />
                                        <input type="text" name="apiKey" value="{{$apiKey}}"  hidden />
                                        <input type="text" name="redirect" value="{{$redirect}}"  hidden />
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="password"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary align-right" value="Pay" placeholder="email"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        
    </script>
</body>
</html>
