<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cloud bank</title>
        <link rel="icon" href="/img/icon.ico"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="/css/jquery-confirm.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tangerine|Julius+Sans+One" rel="stylesheet">    
        <style>
            body{
                background: url("/img/home.jpg") no-repeat;
                height: 100%; 
                width: 100%; 
                z-index: -2; 
            }
            .navbar-default{
                border: none;
                background-color: transparent; 
            }
            .btn-primary,.btn-primary:hover{
                background:#3F51B5;
                color:white;
            }
            .form-control{
                border: none; 
                border-radius: 0px;
                box-shadow: none; 
                border-bottom: 1px solid #fff; 
            }
            .form-control:hover{ border-bottom: 2px solid #7986CB;}
            .form-control:focus{
                border-bottom: 2px solid #3F51B5;
                box-shadow: none;  
            }
            .navbar-default .navbar-nav>.open>a{
                background-color:transparent !important; 
            }
            .navbar-default h4{
                margin-bottom: 0px;
                margin-top: 1em;
            }
            #centeral-secion{
                color: white ; 
                text-shadow: 2px 3px 4px rgba(0,0,0,.5);
            }
             #centeral-secion h4{
                margin-top: 1em;
                margin-bottom: 1.5em; 
            }
            #centeral-secion .btn-lg{
                display: block !important;
                color: white ; 
                background: transparent; 
                text-shadow: 2px 3px 4px rgba(0,0,0,.5);
                box-shadow: 2px 3px 4px rgba(0,0,1);
            }
            .navbar-nav>li>.dropdown-menu{
                padding: 1em;
                width: 230px;
                border-radius: 8px;
                opacity: 0.95;
            }
            .dropdown-menu form>input{ margin-top: 10%;}
            .form-group>.col-md-6{
                margin-bottom: 1em;
                padding: 3px;
            }
            
            .jconfirm-buttons{display:none}
            .jconfirm-holder{font-size: 10px}
            .err-message{
                color: red; 
                font-style: italic;
            }
            #background-cover{
                top:0px; 
                left: 0px; 
                width: 100%; 
                height: 100%; 
                position: absolute;
                border: 2px solid red; 
                z-index: -1; 
                background: rgba(7,7,9,0.3); 
                filter: grayscale(100%); 
            }
            #signUp,#login-box{
                background: rgba(0,0,0,0.6);
                border: 1px solid rgba(255,255,255, .5); 
                color: #fff; 
            }
            #signUp .form-control,#login .form-control{
                background:transparent; 
                color: #fff; 
            }
            .jconfirm-title{
                color: #fff;   
            }
            .jconfirm.jconfirm-material .jconfirm-bg{
                background-color: rgba(0,0,0,0.5); 
            }
            #centeral-secion{
                position: absolute; 
                top: 50%; 
                left: 50%; 
                transform: translatey(-76%) translatex(-50%); 
            }
            #login-box::before {
                position: absolute;
                top: -7px;
                left: 90px;
                display: inline-block;
                border-right: 14px solid transparent;
                border-bottom: 14px solid #CCC;
                border-left:14px solid transparent;
                border-bottom-color: rgba(0, 0, 0, 0.2);
                content: '';
            }
            #login-box::after {
                position: absolute;
                top: -12px;
                left: 160px;
                display: inline-block;
                border-right: 12px solid transparent;
                border-bottom: 12px solid rgba(0,0,0,0.7);
                border-left: 12px solid transparent;
                content: '';
            }
        @media (min-width: 768px){
                .col-md-offset-4{
                    width: 50%;
                    margin-left: 25%;
                    padding-bottom: 0px;
                }
            }
        </style>
    </head>
    <body>
    <div id="background-cover"></div>
    <main class="container-fluid" style="z-index: 1000;color: white">
        <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;font-weight:500;">
                        <h4 class="pull-right" style="margin-right: 1em;margin-bottom: 1em">LOGIN</h4>
                    </a>
                    <div class='dropdown-menu' id="login-box">
                    <div class="container-fluid" style="padding:0px;margin: 5px">
                        <h4 style="margin: 1em">Login</h4>
                         @if (($errors->has('email')))
                            @if ($errors->has('email') === 'These credentials do not match our records.')
                                <div class='err-message'style="margin: 4px;paddign: 1em">Invalid email or password</div>
                                <style>
                                    .dropdown-menu{
                                        display: block;
                                    }
                                    .dropdown-menu .form-control{
                                        border: none;
                                        border-bottom: 1px solid red;
                                    }
                                    .dropdown-menu .form-control:hover{border-bottom:2px solid red;}
                                    .dropdown-menu .has-error,.dropdown-menu .form-control:focus{border-bottom:2px solid red;box-shadow:none}
                                </style>
                            @endif
                         @endif
                        <form action="{{ route('login') }}" method="POST" class="form" id="login" >
                             {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right" style="margin:1em">Login</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
     </nav> 
     <div class="container text-center" id="centeral-secion">
        <h1 style="font-family: 'Tangerine', cursive;font-size: 6em;margin-bottom: 0.3em;">Cloud Bank</h1>
        <h4 style="font-family: 'Julius Sans One', cursive;" class="lead">Simulate your banking and payent flowlessly with us!</h4>
        <center>
            <button class="btn btn-lg btn-default" id="create-accout-btn" style="border-color: white">Create Account</button>
        </center>
     </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/jquery-confirm.min.js"></script>
    <script> var err = '';</script>
     {!! "<script>var csrf='".csrf_field()."';</script>"!!}

    @if($errors->has("email") == 'The email has already been taken.')
        {!!"<script>err ="."'<div class=\"alert alert-danger\" style=\"font-size:1.5em\">The email has already been taken</div>'"."; </script>"!!}
        <style>
            .jconfirm-holder #email-err{
                border-bottom: 1px solid red    ; 
            }
        </style>
    @endif
    <script>
         var signup_modal = $.confirm({
                                title: 'Create account',
                                backgroundDismiss: true,
                                theme: 'material',
                                lazyOpen: true,
                                content: '' +
                                '<form action="/register" class="form" method="POST">' +
                                    csrf+
                                    err+
                                    '<div class="form-group" style="margin-bottom: .8em">' +
                                        '<div class=col-md-6>'+
                                            '<input type="text" name="first_name"placeholder="First name" class="form-control" required />' +
                                        '</div>'+
                                        '<div class=col-md-6>'+
                                            '<input type="text" name="middle_name"placeholder="Middle name" class="form-control" required />' +
                                        '</div>'+
                                    '</div>' +    
                                    '<div class="form-group">' +
                                        '<input type="text" name="last_name"placeholder="Last name" class="form-control" required />' +
                                    '</div>' +
                                    '<div class="form-group">' +
                                        '<input type="email" name="email" placeholder="Email" id="email-err" class="form-control" required />' +
                                    '</div>' + 
                                    '<div class="form-group" style="margin-bottom: .8em">' +
                                        '<div class=col-md-6>'+
                                            '<input type="password" name="password"placeholder="Password" class="form-control" required />' +
                                        '</div>'+
                                        '<div class=col-md-6>'+
                                            '<input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control" required />' +
                                        '</div>'+
                                    '</div>' +                    
                                    '<div class="form-group">' +
                                        '<input type="tel" name="phone" placeholder="Phone" class="form-control" required />' +
                                    '</div>' +                  
                                    '<div class="form-group" style="margin-bottom: .8em">' +
                                        '<div class=col-md-6>'+
                                            '<select name="region" placeholder="Region" class="form-control" required >' +
                                                '<option value=1 >Amhara</option>'+
                                                '<option value=2 >Tigraye</option>'+
                                                '<option value=3 >Oromiya</option>'+
                                                '<option value=4 >Afar</option>'+
                                                '<option value=5 >Benishangule</option>'+
                                                '<option value=6 >Gambela</option>'+
                                                '<option value=7 >Adis Ababa</option>'+
                                                '<option value=8 >Diredewa</option>'+
                                                '<option value=9 >South peoples</option>'+
                                                '<option value=10 >Somali</option>'+
                                                '<option value=11 >Hareri</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class=col-md-6>'+
                                            '<input type="text" name="city" placeholder="City" class="form-control" required />' +
                                        '</div>'+
                                    '</div>' +                  
                                    '<div class="form-group"  style="margin-bottom: .8em">' +
                                        '<div class=col-md-6>'+
                                        '<input type="text" name="sub_city_or_zone" placeholder="Subcity or zone" class="form-control" required />' +
                                        '</div>'+
                                        '<div class=col-md-6>'+
                                        '<input type="text" name="woreda"placeholder="Woreda" class="form-control" required />' +
                                        '</div>'+
                                    '</div>' +
                                    '<div class="form-group">' +
                                        '<div class="form-group" style="margin-bottom: .8em">' +
                                            '<div class=col-md-6>'+
                                                '<input type="date" name="DOB"placeholder="Date of birth" class="form-control" required />' +
                                            '</div>'+
                                            '<div class=col-md-6>'+
                                                '<input type="number" name="anual_income" placeholder="Anual income" class="form-control" required />' +
                                            '</div>'+
                                        '</div>' +    
                                    '</div>' +
                                    '<div class="form-group">' +
                                        '<button type="submit" style="background-color :#3F51B5;" class="btn btn-primary form-control">Create</button>' +
                                    '</div>' +
                                '</form>'
                            });
   </script> 
    @if($errors->has("email") == 'The email has already been taken.')
        {!!"<script>signup_modal.open();</script>"!!}
    @endif
     {{--  <footer class="navbar navbar-inverse navbar-fixed-bottom pull-center">
            <ul class="nav navbar-nav container" style="display: inline;width: 250px;margin-left:35%" >
                <li style="float: left;margin:auto" ><a href="#">Devlopers</a></li>
                <li style="float: left;margin:auto" ><a href="#">About</a></li>
                <li style="float: left;margin:auto" ><a href="#">contact</a></li>
            </ul>
     </footer>  --}}
    <script>
        $(document).on("click", "#centeral-secion .btn",function(){
            signup_modal.open();
        });
     </script>
    </main>
    
    </body>
</html>
