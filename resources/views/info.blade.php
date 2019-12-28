@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron">
                <h3>Introduction</h3>
be solving. This project is for client side web programing, Database and Object oriented
programing.</p>
            </div>
            <div class="jumbotron">
                <h3>Statement of the problem</h3>
                <hr>
                <p>Students who are working on software projects (especially graduating students) are
encountering a problem of working with payment and financial institutions. This is
because of the lack of APIs provided by banks. There are no online payment systems in
the country. This made working and simulating payment related and dependent software
systems impossible. Because of this problem evaluation of final project of graduating
students with payment related projects impossible for evaluators</p>
            </div>
            <div class="jumbotron">
                <h3>General objective</h3>
                <hr>
                <p>The general objective of this project to allow students who are working on software
projects to simulate payment and financial dependent systems flawlessly</p>
            </div>
            <div class="jumbotron">
                <h3>Scope of the project</h3>
                <hr>
                <p>When this software project is compiled it will do every activates of bank and process payments
for any developer in Debremarkos university. Developers can also work with its APIs</p>
            </div>
            <div class="jumbotron">
                <h3>Significance of the project</h3>
                <hr>
                <p>This project allows graduating students to work confidently on their project with full
power of payment and financial system.</p>
            </div>
    
        </div>
        <div class="col-md-4"> 
            <div class="jumbotron">
                <h3>Developers</h3>
                <hr>
                <ul class="list-group">
                <?php $arr = [['Eba Alemayehu','TER_0075_09'],
                              ['Aynalem Tessfaye','TER_0067_09'],
                              ['Mekdes Tilahun','TER_0100_09'],
                              ['Kidist Belayenehe','TER_0089_09'],
                              ['Messeret Zelalem','TER_0095_09'],
                              ['Dawed Mohamed','TER_1417_09'],
                              ['Demelash Kassaye','TER_0074_09']
                        ];
                ?>
                @foreach($arr as $member)
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <img src="/img/user.png" class="img-circle media-object" style="width:50px">
                            </div>
                            <div class="media-body">
                                <b class="media-header text-capigalize">{{$member[0]}}</b>
                                <small class="text-capital">{{$member[1]}}</small>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
