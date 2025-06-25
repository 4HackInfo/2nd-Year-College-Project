<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <!-- Include shared styles -->
  <link rel="icon" href="logo.png">
  <style>
  * {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
  }

  body {
    background: url('assets/background.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-blend-mode: color;
    background-color:rgba(0, 0, 0, 0.28);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100vh;
    margin: 0;
  }

  .container {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 20px rgba(0,0,0,0.2);
    width: 30%;
    text-align: center;
  }

  .container img {
    width: 60px;
    margin-bottom: 20px;
  }

  h2 {
    font-weight: bold;
    letter-spacing: 2px;
    margin-bottom: 25px;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 6px;
    text-align: left;
    font-size: 0.9rem;
  }

  button {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    background-color: #003300;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
  }

  button:hover {
    background-color: #005000;
  }

  .link {
    font-size: 0.8rem;
    margin-top: 10px;
    color: #666;
  }

  .link a {
    text-decoration: none;
    color: #0055cc;
  }

  .link a:hover {
    text-decoration: underline;
  }
  @media screen and (max-width:1100px){
    .container{
      width: 80%;
    }
    input[type]{
      font-size: 20px;
    }
  }

  @media screen and (max-width:600px){  
    .container{
      max-width: 50%;
    }
    input[type]{
      font-size: 200px;
    }
  }


</style>

</head>
<body>
  <div class="container">
    <img src="assets/logo.png" alt="Logo">
    <h2>LOGIN</h2>
    <form action="php/login_process.php" method="POST">
      <input type="text" name="username" placeholder="username.." required>
      <input type="password" name="password" placeholder="password.." required>
      <button type="submit" onclick="navigateTo('php/login_process.php')">LOGIN</button>
    </form>
    <div class="link">
      Don’t have an account? <a href="signup.php">Sign Up</a>
    </div>
  </div>

  <script>
    function navigateTo(pages){
      window.location.href = pages;
    }
  </script>
</body>
</html>
