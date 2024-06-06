<?php
$con = new mysqli('localhost', 'root', 'ridham@2003', 'voting');
if (!$con) {
    die(mysqli_error($con));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: 'Poppins';
        }
        h1 {
            text-align: center;
            font-size: 50px;
            font-weight: 600;
            margin-top: 30px;
        }
        .container{
            display: flex;
            padding: 30px 20px;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: 10px;
            margin: 100px auto;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 10px;
            max-width: 500px;
        }
        h2{
            margin-left: 30px;
            font-size: 30px;
            font-weight: 800;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
            margin-left: 30px;
        }
        .input{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .input input{
            width: 400px;
            height: 20px;
            padding: 5px 10px;
        }
        button{
            padding: 2px 6px;
            font-size: 20px;
            border-radius: 10px;
            background: black;
            color: white;
            border: 1px solid black;
            width: 200px;
            margin: 10px auto;
        }
        p{
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <h1>Voting System</h1>
    <div class="container">
        <h2>Login</h2>
            <form action="">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Username">
                </div>
                <div class="input">
                    <label for="mobile">Phone no.</label>
                    <input type="text" name="mobile" id="mobile" placeholder="Enter Phone no.">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" placeholder="Enter Password">
                </div>
                <div class="input">
                    <label for="">Choose Type:</label>
                    <select id="type" name="type">
                        <option value="Group">Group</option>
                        <option value="Voter">Voter</option>
                    </select>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have ans account? <a href="./partials/register.php">Register here!</a></p>
        </div>

</body>

</html>