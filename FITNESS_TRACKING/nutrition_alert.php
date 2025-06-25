<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Alert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: url(assets/background.jpg) no-repeat fixed center;
            background-size: cover;
            background-blend-mode: color;
            background-color: rgba(0, 0, 0, 0.61);
            margin: 0;
            padding: 20px;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            margin: auto;
            height: 100vh;
        }

        .header {
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        span {
            color: white;
        }

        .question-box {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .yes-no {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .button-container {
            margin-top: 15px;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-self: center;
            align-self: center;
            align-items: center;
        }

        .yes-btn { background-color: #28a745; color: white; }
        .no-btn { background-color: #dc3545; color: white; }

        .message-box {
            margin-top: 15px;
            padding: 15px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            background-color: white;
        }

        .success { background-color: #d4edda; color: #155724; }
        .danger { background-color: #f8d7da; color: #721c24; }

        .start-btn {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            margin-top: 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .back {
            position: absolute;
            top: 5px;
            left: 25px;
        }

        .container-response {
            margin-top: 50px;
            padding: 20px;
            width: 100%;
            height: 50vh;
            display: block;
            justify-content: center;
            align-content: center;
            border: 1px solid white;
            border-radius: 25px;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .summary li {
            list-style-type: none;
            position: relative;
        }

        .summary ul > li::before {
            content: "📌";
            position: absolute;
            left: 0;
        }
        @media screen and (max-width:700px){
            .container {
            
            max-width: 300px;
            height: 100vh;
        }
        }
    </style>
</head>
<body>

<div class="back" onclick="navigateTo('dashboard.php')">
    <img src="assets/back.png" alt="back-button">
</div>

<div class="container">
    <div class="header">
        <img src="assets/nutrition_alert.png" alt="Nutrition Alert Logo" width="40">
        <span>Nutrition Alert</span>
    </div>
    <div class="container-response">
        <div id="alerts"></div>
        <div id="summary"></div>
        <button id="startBtn" class="start-btn" onclick="startQuestions()">Start</button>
        <button id="exitBtn" class="start-btn" style="display: none;" onclick="navigateTo('dashboard.php')">Exit</button>
    </div>
</div>

<script>
    let questions = [
        { text: "Have you had some water today?", yes: "✅ Great! Keep staying hydrated.", no: "🚨 Please drink some water now!" },
        { text: "Did you eat enough protein today?", yes: "✅ Good job! Protein helps muscle growth.", no: "🚨 Try to eat some eggs, chicken, or tofu!" },
        { text: "Did you consume too much sugar today?", yes: "🚨 Be mindful! Cut back on sugary snacks.", no: "✅ Awesome! Keep making healthy choices." },
        { text: "Did you eat fresh fruits or vegetables today?", yes: "✅ Excellent! Vitamins and fiber are essential.", no: "🚨 Consider adding fruits and veggies to your meal!" }
    ];

    let currentQuestion = 0;
    let recommendations = [];

    function startQuestions() {
        currentQuestion = 0;
        recommendations = [];
        document.getElementById("alerts").innerHTML = "";
        document.getElementById("summary").innerHTML = "";
        document.getElementById("startBtn").style.display = "none";
        document.getElementById("exitBtn").style.display = "none";
        showQuestion();
    }

    function showQuestion() {
        if (currentQuestion < questions.length) {
            let q = questions[currentQuestion];
            document.getElementById("alerts").innerHTML = `<div class='question-box'>${q.text} <br><br>
                <div class="yes-no">
                <button class='yes-btn' onclick='userResponse(true)'>Yes</button> 
                <button class='no-btn' onclick='userResponse(false)'>No</button></div>
                </div>`;
        } else {
            displaySummary();
        }
    }

    function userResponse(answer) {
        let q = questions[currentQuestion];
        let responseText = answer ? q.yes : q.no;
        document.getElementById("alerts").innerHTML += `<div class='message-box ${answer ? 'success' : 'danger'}'>${responseText}</div>`;
        if (!answer) {
            recommendations.push(q.no);
        }
        currentQuestion++;
        setTimeout(showQuestion, 1200);
    }

    function displaySummary() {
        let summaryHTML = "<h3>📝 Your Nutrition Recommendations:</h3>";
        if (recommendations.length > 0) {
            summaryHTML += "<ul style='text-align: left; margin: 0 auto; max-width: 400px;'>"
                + recommendations.map(rec => `<li>${rec}</li>`).join('') + "</ul>";
        } else {
            summaryHTML += "<p>✅ You're doing great! Keep making healthy choices.</p>";
        }
        document.getElementById("summary").innerHTML = `<div class='message-box warning'>${summaryHTML}</div>`;
        document.getElementById("exitBtn").style.display = "block";
    }

    function navigateTo(pages) {
        window.location.href = pages;
    }
</script>
</body>
</html>
