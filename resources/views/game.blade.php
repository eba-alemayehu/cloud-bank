@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron" id="game_area" sytle="padding-left:0px; padding-right:0px;">
                    <h3 style="margin-left: 1em" >Game</h3>
                    <p id="hs"></p>
                    <canvas style=" background: url('game/background.jpg');margin: 0;width: 100%;height: 400px" id="game-area"></canvas>
                    <img src='game/box-0.png' style="width:120px; height: 65px" id='box' hidden/>
                </div>              
            </div>
        </div>
    </div>
    <script src="js/game.js"></script>
@endsection