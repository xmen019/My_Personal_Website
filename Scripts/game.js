$(function(){
	var clickedTime;
            var createdTime;
            var timeSpend;
            var midTime;
            var hiden = true;
            var count = 0;
            var totalTime = 0;
            var averageTime = 0;
            var bgArray = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"];
            var timeInterval;

            var path = 'Img/hobbies/game/';
            function makeBox() {
                var time = Math.random();
                time = time * 4000 + 2;
                midTime = time;
                timeInterval= setTimeout(function () {
                    var bg = bgArray[Math.floor(Math.random() * bgArray.length)];
                    document.getElementById("box").style.display = "block";
                    document.getElementById("box").style.backgroundImage = "url(" + path + bg + ")";
                    document.getElementById("box").style.backgroundSize = "auto";
                    createdTime = Date.now();

                }, time);

            }
            function clearBox() {
                clearTimeout(timeInterval);
            }

            document.getElementById("startButton").onclick = function () {
                makeBox();
                showGamePage()
                document.getElementById("gamePage").style.display = "block";
                document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/bg3.jpg')";
                document.getElementById("startPage").style.display = "none";
            }
            function showGamePage() {
                document.getElementById("box").onclick = function () {
                    if (count < 5) {
                        count++;
                        clickedTime = Date.now();

                        timeSpend = (clickedTime - createdTime) / 1000;
                        totalTime = totalTime + timeSpend;
                        document.getElementById("yourTime").innerHTML = timeSpend;
                        document.getElementById("times").innerHTML = count;
                     
                        this.style.display = "none";
                        makeBox();
                        showGamePage();
                    }
                  
                    if (count >= 5) {
                        averageTime = totalTime / 5;
                        document.getElementById("gamePage").style.display = "none";
                        document.getElementById("startPage").style.display = "none";
                        clickedTime = 0;
                        createdTime = 0;
                        clearBox();
                        averageTime = averageTime.toFixed(2);
                        if (averageTime <= 0.3) {
                            document.getElementById("finishPage1").style.display = "block";
                            document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/page1.jpg')";
                            document.getElementById("gameOver").style.backgroundSize = 'cover';
                            document.getElementById("averageTime1").innerHTML = averageTime;
                        }
                        if (averageTime > 0.3 && averageTime <= 0.36) {
                            document.getElementById("finishPage2").style.display = "block";
                            document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/Nid.jpg')";
                            document.getElementById("gameOver").style.backgroundSize = 'cover';
                            document.getElementById("averageTime2").innerHTML = averageTime;
                        } if (averageTime > 0.36 && averageTime <= 0.45) {
                            document.getElementById("finishPage3").style.display = "block";
                            document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/kat.jpg')";
                            document.getElementById("gameOver").style.backgroundSize = 'cover';
                            document.getElementById("averageTime3").innerHTML = averageTime;;
                        } if (averageTime>0.45) {
                            document.getElementById("finishPage4").style.display = "block";
                            document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/jax.jpg')";
                            document.getElementById("gameOver").style.backgroundSize = 'cover';
                            document.getElementById("averageTime4").innerHTML = averageTime;
                        }
                       
                    }

                }
            }
            $(".tryAgain").click(function () {

                count = 0;
                totalTime = 0;
                timeSpend = 0;

                makeBox();
                document.getElementById("yourTime").innerHTML = timeSpend;
                document.getElementById("times").innerHTML = count;
              

                showGamePage();
                document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/bg3.jpg')";
                document.getElementById("gamePage").style.display = "block";
                document.getElementById("finishPage1").style.display = "none";
                document.getElementById("finishPage2").style.display = "none";
                document.getElementById("finishPage3").style.display = "none";
                document.getElementById("finishPage4").style.display = "none";

            })
            $(".back").click(function () {
                count = 0;
                totalTime = 0;
                timeSpend = 0;
                document.getElementById("yourTime").innerHTML = timeSpend;
                document.getElementById("times").innerHTML = count;
                showGamePage();
                document.getElementById("gameOver").style.backgroundImage = "url('Img/hobbies/game/teemo.jpg')";
                document.getElementById("startPage").style.display = "block";
                document.getElementById("finishPage1").style.display = "none";
                document.getElementById("finishPage2").style.display = "none";
                document.getElementById("finishPage3").style.display = "none";
                document.getElementById("finishPage4").style.display = "none";
            });
});