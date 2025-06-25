<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>

    <style>
        body{
            margin: 0;
            width: 100%;
            height: 100vh;
            background: url(assets/introduction_background2.jpg );
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.69);
            
            font-family:'Times New Roman', Times, serif;
            display: grid;
            justify-items: center;
            align-items: center;
        }
        .introduction-content{
            width: 30%;
            height: 95vh;
            border-radius: 10px;
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-rows: 150px 420px 100px 70px;
        }
        .logo{
            width: 70px;
            background-color: white;
            border-radius: 100%;
            display: grid;
            justify-self: center;
            align-self: center;
        }
        .context {
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            font-size: 15px;
            position: relative;
            color: whitesmoke;
        }

        .context::after {
            content: "Lose weight, Gain Muscle";
            animation: slide 7s linear infinite;
            }

        @keyframes slide {
            0% { content: "Lose weight, Gain Muscle"; }
            50% { content: "“No pain, No gain!”"; }
            100% { content: "Time to  change!"; }
        }
        .continue-button{
            width: 100%;
            height: 50px;
            border-radius: 10px;
            background-color:rgb(4, 92, 23);
            border: none;
            letter-spacing: 10px;
        }
        .hero{
            filter: drop-shadow(0 0 10px white);
            animation: fade 2s  ease-in-out infinite;
        }
        @keyframes fade {
            10%{
                filter: drop-shadow(0 0 30px white);
            }
            50%{
                filter: drop-shadow(0 0 40px white);
            }
            80%{
                filter: drop-shadow(0 0 20px white);
            }
            
        }
            
        
        .continue-button:hover{
            width: 100%;
            height: 50px;
            border-radius: 10px;
            background-color:rgb(6, 194, 78);
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="introduction-content">
<img src="assets/logo.png" alt="" class="logo">
<img src="assets/hero.png" alt="" class="hero">
<p class="context"></p>
<button class="continue-button"><a href="login.php">Continue</a></button>
</div>
    
</body>
</html>