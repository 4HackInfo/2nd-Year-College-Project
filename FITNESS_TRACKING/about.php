<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('assets/introduction_background2.jpg') no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color: rgba(0, 0, 0, 0.54);
            color: white;
        }

        .back {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            width: 50px;
        }

        .back img {
            width: 40px;
        }

        .about-container {
            max-width: 1200px;
            margin: 80px auto;
            padding: 20px;
            text-align: center;
        }

        .about-container h1 {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 40px;
            letter-spacing: 15px;
            text-decoration: underline;
            text-underline-offset: 30px;
        }

        .our-team h2 {
            color: #FFD700;
            letter-spacing: 10px;
            font-size: 35px;
            margin-bottom: 30px;
            margin-top: 100px;
        }

        .team-members {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .member {
            background: rgba(0, 0, 0, 0.54);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .member img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .member h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }

        .member p {
            font-size: 14px;
            color: #ccc;
        }

        .box {
            background: rgba(0, 0, 0, 0.63);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .box h3 {
            color:rgb(180, 160, 44);
            margin-bottom: 10px;
            font-size: 50px;
        }

        .box p {
            color: #ccc;
            font-size: 25px;
            text-align: justify;
            line-height: 45px;
        }
        .box ul>li{
            text-align: justify;
            font-size: 20px;
            line-height: 45px;
        }
        .back-button{
            width: 100px;
        }
        @media screen and (max-width:700px) {
            .box p{
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="back" onclick="navigateTo('dashboard.php')">
        <img src="assets/back.png" alt="back-button">
    </div>

    <div class="about-container">
        <h1>ABOUT US</h1>

        <div class="our-team">
            <h2>OUR TEAM</h2>
            <div class="team-members">
                <div class="member">
                    <img src="assets/profile2.jpg" alt="Christian">
                    <h3>Andiason, Christian</h3>
                    <p>Developer / Backend</p>
                </div>
                <div class="member">
                    <img src="assets/profile3.jpg" alt="Joshua">
                    <h3>Alguno Joshua</h3>
                    <p>Project Manager</p>
                </div>
                <div class="member">
                    <img src="assets/profile6.jpg" alt="Eugene">
                    <h3>Cabellon Eugene</h3>
                    <p>UI / UX Design</p>
                </div>
                <div class="member">
                    <img src="assets/profile1.jpg" alt="Liegane">
                    <h3>Llaguno Rellenjie</h3>
                    <p>Assistant Project Manager</p>
                </div>
                <div class="member">
                    <img src="assets/profile5.jpg" alt="Regie">
                    <h3>Regis Joross William</h3>
                    <p>Programmer</p>
                </div>
                <div class="member">
                    <img src="assets/profile4.jfif" alt="Henry">
                    <h3>Medrano Henry</h3>
                    <p>Quality Assurance</p>
                </div>

                <div class="member">
                    <img src="assets/profile7.jpg" alt="Moneva">
                    <h3>Moneva Virgelio</h3>
                    <p>Assistant Designer</p>
                </div>
            </div>
        </div>

        <div class="box">
            <h3>VISION</h3>
            <p>Our Vision is to become the top fitness platform through innovative solutions which transform regular exercise into interactive and competitive activities for users while letting them generate individual workout music and build a worldwide fitness community of creative enthusiasts.</p>
        </div>

        <div class="box">
            <h3>MISSION</h3>
            <p>Our Mission is to become the top fitness platform through innovative solutions which transform regular exercise into interactive and competitive activities for users while letting them generate individual workout music and build a worldwide fitness community of creative enthusiasts.</p>
        </div>

        <div class="box">
            <h3>GOAL</h3>
            <p>The Workout Tracking System prioritizes two primary aims to reach higher user engagement by implementing gamification elements which facilitate competitions and reward systems. Our music generator will boost the satisfaction level by generating customized workout playlists for users. Our system will combine workout data and game advancements and individual music selections in analytics assessments to offer workouts for users of any fitness ability.</p>
        </div>

        <div class="box">
            <h3>OBJECTIVES</h3>
           <ul><li>Enhance User Motivation & Engagement – Encourage users to stay committed to their fitness goals through an interactive and gamified experience.</li>
               <li>Track & Improve Fitness Outcomes – Monitor repetitions, duration, and consistency to help users measure progress and enhance performance.</li>
               <li>Encourage Persistence & Enjoyment – Utilize leaderboards, achievements, and dynamic challenges to make workouts more enjoyable and effective.</li>
           </ul>
        </div>

    </div>

    <script>
        function navigateTo(pages) {
            window.location.href = pages;
        }
    </script>
</body>
</html>
