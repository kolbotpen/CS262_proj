<!DOCTYPE html>
<html onmouseover="playOST();">
<head>
    <title>Grab the Rat</title>
    <style>
        #moving-rat {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: 0.4s;
            font-size: 24px;
            padding: 12px 24px;
        }

        #moving-rat:hover {
            content: url(https://i.ibb.co/L9QnZgk/output-onlinepngtools-1.png);
            width: 300px;
            cursor: none;
        }

        #score {
            font-size: 28px;
            margin-top: 20px;
        }

        html {
            background-image: url("https://img.freepik.com/premium-vector/vector-white-modern-abstract-background-with-light-gray-mat-square-tiles-pattern_250169-194.jpg");
            cursor: url("https://i.ibb.co/Cs3PQ4t/oie-1792254-Pb-Vp7-N4c.png"), auto;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <br>
    <center><p id="score"><b>You molested the rat <span id="score-value">0</span> times</b></p></center>

    <audio src="https://www.myinstants.com/media/sounds/kitchen-nightmare-dramatic-sound-effect.mp3" id="violin"></audio>
    <audio src="https://www.myinstants.com/media/sounds/call-of-duty-zombie-yell-meme-sound-effect.mp3" id="AHHH"></audio>
    <audio src="https://anonsharing.com/file/6d35f8400862045b/penis_music_(compressed).mp3" loop id="OST"></audio>

    <img src="https://i.ibb.co/qx7YQ9t/oie-0fi-EH78-Ut-QOD.png" width="100px" id="moving-rat" onmouseover="playViolin(); moverat(); updateScore();" onclick="playAHHH(); showModal();">

    <!-- The Modal -->
    <div id="congratsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Congratulations! You have grabbed the rat.</h1>
            <h3>You hovered over the rat <span id="hover-count"></span> times.</h3>
        </div>
    </div>

    <script>
        let score = 0;

        function moverat() {
            const rat = document.getElementById('moving-rat');
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            const randomX = Math.floor(Math.random() * (windowWidth - rat.offsetWidth));
            const randomY = Math.floor(Math.random() * (windowHeight - rat.offsetHeight));

            rat.style.left = `${randomX}px`;
            rat.style.top = `${randomY}px`;
        }

        var x = document.getElementById("violin"); 

        function playViolin() { 
            x.play(); 
        } 
        document.getElementById("AHHH").volume = 0.3;

        var y = document.getElementById("AHHH"); 

        function playAHHH() { 
            y.play(); 
        } 
        document.getElementById("AHHH").volume = 0.1;

        var z = document.getElementById("OST"); 

        function playOST() { 
            z.play(); 
        } 
        document.getElementById("OST").volume = 0.1;

        function updateScore() {
            score++;
            const scoreValue = document.getElementById('score-value');
            scoreValue.textContent = score;
        }

        function showModal() {
            const modal = document.getElementById("congratsModal");
            const hoverCount = document.getElementById("hover-count");
            hoverCount.textContent = score;
            modal.style.display = "block";

            const span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
