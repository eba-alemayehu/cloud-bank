var script = document.getElementById("appJs");
console.log(script);
script.remove;
var canvas = document.getElementById("game-area");

       
        var c = canvas.getContext("2d");
        var score = 0,_score = 0;bonus_score=0; life = 3, bottles = [],bonus = [],clicked = false;
        var frameCounter = 0;
        var farmePerSecond = 0; 
        var bottlesDifference = 4;
        var _gameOver = false;
        var boxType = 0;
        var brokenSound = new Audio();
        brokenSound.src = "game/broken.mp3"; 

        var slide = new Audio();
        slide.src = "game/slide.wav";
        
        c.fillStyle = "#fff"; 

        function ajax(type, url,action) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    action(this.responseText); 
                }
            };
            xmlhttp.open(type, url, true);
            xmlhttp.send();
            
        }
        var p = document.getElementById("hs"); 
        ajax("GET", "/game score/highscore",function(r){
            console.log("ladsjf");
            p.innerText = "high score: " + parseInt(r);
        });
        function rand(min, max) {return Math.floor(Math.random() * (max - min + 1)) + min;}

        function update(arr){
            arr.forEach(function (data) { data.update() });
        }
        function gameOver(){
            c.clearRect(0,0,canvas.width,canvas.height);
            var box = new Box(canvas.width / 2-60, 5, "#3de");

            c.fillStyle = "#fff"; 
            c.font = "12px sans-serif";
            c.fillText("GAME OVER", canvas.width/2-50, canvas.height/2-14);
            
            c.font = "10px aarial"; 
            c.fillText("Duble click to restart", canvas.width/2-60, canvas.height/2+12);
            
            c.font  = "10px arial"; 
            total_score = score+bonus_score;
            c.fillText("Score: "+total_score,canvas.width-50,20);
            c.fillText("Life: "+ life,canvas.width-50,30);

            ajax("POST", "/game score/"+total_score, function(response){
                console.log(response); 
            });
            box.x = canvas.width/2 - 50; 
            box.init();
            bottles = [];
            bonus = [];
            _gameOver = true; 
        }
        function restart(){
            if(_gameOver){
                window.location.reload()
            }
        }
        function Box(x, vx, color) {
            this.x = x;
            this.vx = vx;

            this.init = function () {
                var box = new Image();
                box.src = '/game/box-'+boxType+'.png';

                c.drawImage(box, this.x, canvas.height-28,60, 28);
            }

            this.update = function (vx) {
                this.x += vx;
                if (this.x > canvas.width - 60) {
                    this.x = canvas.width - 60;
                    return false; 
                } else if (this.x < 0) {
                    this.x = 0;
                    return false; 
                }
                c.clearRect(this.x,this.y, 120,40); 

                this.init();

            }

        }
        var box = new Box(canvas.width / 2-30, 5, "#3de");
        function Bottle(x, vy, color) {
            this.x = x;
            this.y = 0;
            this.vy = vy;
            this.counted = false;
            this.stopUpdateing = false;

            this.init = function () {
                var bottle = new Image();
                bottle.src = "/game/bottle2.png";
                bottle.style.display = "none"; 
                c.drawImage(bottle, this.x, this.y,10, 30); 
                
            }

            this.update = function () {
                if(!this.stopUpdateing){
                    this.init();
                    this.y += (score/5)+1;
                    if(this.y < 2){
                        this.y += 2; 
                    }
                    if (!this.counted) {
                        if (this.y > canvas.height - 30){
                            if(this.x >= box.x && this.x <= box.x + 60){
                                score++;
                                this.stopUpdateing = true;
                            }else{
                                setTimeout(function(){ brokenSound.play()},500);
                                life--; 
                            }
                           
                            
                            this.counted = true;    
                        }
                    }
                }
                
            }
        }
        function BonusBottle(x) {
            this.x = x;
            this.y = 0;
            this.counted = false;
            this.stopUpdateing = false; 

            this.init = function () {
                var bottle = new Image();
                bottle.src = "game/bonus.png";
                c.drawImage(bottle, this.x, this.y,15, 35); 
            }

            this.update = function () {
                if(!this.stopUpdateing){
                    this.init();
               
                    this.y += 4;
                    if(this.y < 2){
                        this.y += 2; 
                    }
                    if (!this.counted) {
                        if (this.y > canvas.height - 40){
                            if(this.x >= box.x && this.x <= box.x + 120) 
                                bonus_score+=5;
                            
                            this.counted = true;    
                        }
                    }   
                }
            }
        }
        
        function gameLoop() {
            c.clearRect(0, 0, canvas.width, canvas.height);
            // var animation =requestAnimationFrame(gameLoop);
            update(bottles);
            update(bonus); 
            box.init();

            frameCounter++;

            if(score%5 == 0 &&(bottlesDifference>2)){
                if(_score != score){
                    bottlesDifference *= 0.75;
                    _score = score; 
                    console.log(bottlesDifference);
                }
            }

            if(frameCounter%(farmePerSecond*Math.ceil(bottlesDifference)) == 0){
                bottles.push(new Bottle(rand(1, canvas.width-20), 1, "#ff0"));
                if((score%5 == 0)&& score>0){
                    bonus.push(new BonusBottle(rand(1, canvas.width-30)));
                }
            }

            c.font  = "10px arial"; 
            total_score = score+bonus_score;
            c.fillText("Score: "+total_score,canvas.width-50,20);
            c.fillText("Life: "+ life,canvas.width-50,30);
            
            var __score = score%24;
            switch(__score){
                case 0:
                    boxType = 0; 
                break;
                case 4:
                    boxType = 1; 
                break;
                case 8:
                    boxType = 2; 
                break;
                    case 12:
                    boxType = 3; 
                break;
                case 16:
                    boxType = 4; 
                break;
                case 20:
                    boxType = 5; 
                break;
                case 23:
                    boxType = 6; 
                break;
            }
            
            if(life == 0 && !_gameOver){
                gameOver();
                clearInterval(loop);
            }
        }
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            
            xhttp.open("POST", "", true);
            xhttp.send();
        }
        setTimeout(function(){farmePerSecond = frameCounter;},1010);

        window.addEventListener("keydown", function (event) {
            c.clearRect(0, 0, canvas.width, canvas.height);
            switch (event.keyCode) {
                case 37:
                    slide.play();
                    setTimeout(function(){slide.pause()},2000);
                    box.update((score<25)?-15:-25);
                    break;
                case 39:
                    slide.play();
                    setTimeout(function(){slide.pause()},2000);
                    box.update((score<25)?15:25);
                    break;
            }
        });
        window.addEventListener("resize",function(){
            canvas.width = window.canvas.width;
            canvas.height = window.canvas.height;
            box.init();
        });
        window.addEventListener("unload", function(){
            scoreGame(score + bonus_score);
            console.log("the game");
        });
        // window.addEventListener("mousedown",function(e){
        //     console.log("mouse down"); 
        //     if(e.x < canvas.width/2){
        //         clicked = setInterval(function(){
        //             if(!box.update((score<25)?-5:-10)){
        //                 //clearInterval(clicked);
        //             };
        //         },1000);
        //     }else{
        //         clicked = setInterval(function(){
        //             if(!box.update((score<25)?5:10)){
        //                 //clearInterval(clicked);
        //             };
        //         },1000);
        //     }
        // });
        // window.addEventListener("mouseup",function(e){
        //     console.log("up up up"); 
        //     clearInterval(clicked);
        // });
        var loop =setInterval(function(){gameLoop()},34);