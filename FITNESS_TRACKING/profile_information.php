<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(assets/background.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.56);
        }

        .container {
            width: 90%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .back-button {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            text-align: left;
            margin: 10px 0 5px;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px;
            background: #2c2f24;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #1f221a;
        }
    </style>
</head>
<body>

    <div class="back-button">&#8592;</div>

    <div class="container">
        <h2>PROFILE INFORMATION</h2>
        <form action="php/profile_information_process.php" method="post">
            <label for="name">NAME</label>
            <input type="text" id="name" name="name" placeholder="ENTER YOUR NAME..." required>
            
            <label for="age">AGE</label>
            <input type="number" id="age" name="age" placeholder="ENTER YOUR AGE..." required>
            
            <label for="height">HEIGHT (cm)</label>
            <input type="text" id="height" name="height" placeholder="ENTER YOUR HEIGHT..." required>
            
            <label for="weight">WEIGHT (kg)</label>
            <input type="text" id="weight" name="weight" placeholder="ENTER YOUR WEIGHT..." required>
            
            <label for="gender">GENDER</label>
            <select id="gender" name="gender" required>
                <option value="">YOUR GENDER..</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <button type="submit" class="submit-btn" name="submit">SUBMIT</button>
        </form>
    </div>

</body>
</html>
