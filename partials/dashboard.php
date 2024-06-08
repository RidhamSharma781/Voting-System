<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:../');
}
$data = $_SESSION['data'];
$status = $_SESSION['status'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: 'Poppins';
        }
        body{
            background: #161513;
            color: white;
        }
        .danger{
            color: red;
        }
        .success{
            color: white;
            background-color: green;
        }
        h1 {
            text-align: center;
            font-size: 50px;
            font-weight: 600;
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            font-size: 40px;
            margin-top: 20px;
        }
        .profile-container{
            border-radius: 10px;
            color: black;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            margin: 40px auto;
            width: fit-content;
            padding-right: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: white;
            /* padding: 10px 10px; */
        }
        .container-small{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
          img{
            width: 150px;
            height: 200px;
            border-radius: 10px;
        }
        .info{
            display: flex;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }
         .info p{
            font-size: 20px;
            font-weight: 700;
        }
         .info span{
            font-weight: normal;
        }
        .candidates-container{            
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 50px;
            margin-top: 20px;
        }
        .candidate{
            background-color: white;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 200px;
            height: fit-content;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            padding: 10px 10px;
            border-radius: 10px;
        }
        .candidate img{
            margin: 5px auto;
        }
        .candidate p{
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
         .candidate span{
            font-weight: normal;
        }
        button{
            background-color: white;
            color: black;
            width: 100%;
            padding: 2px 6px;
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover{
            border: 1px solid white;
            color: white;
        }
        .logout{
            background-color: white;
            color: black;
            width: 100%;
            padding: 2px 6px;
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
        }
        .logout:hover{
            background-color: black;
            color: white;
        }
        .danger{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Voting System</h1>
    <div class="profile-container">
        <img src="../uploads/<?php echo $data['photo']?>" alt="">
        <div class="credentials">
            <div class="info">
                <p>Name : <span><?php echo $data['username']?></span></p>
                <p>Mobile no. : <span><?php echo $data['mobile']?></span></p>
                <p>status :  <?php if($status==1){echo "<span style='color:green'>Voted</span>";}else{echo "<span style='color:red'>Not Voted</span>";} ?></p>
               <a href="logout.php"><button class="logout">Logout</button></a> 
            </div>
        </div>
    </div>
    <h2>Candidates</h2>
    <div class="candidates-container">
        <?php
        if(isset($_SESSION['groups'])){
            $groups = $_SESSION['groups'];
            for($i=0;$i<count($groups);$i++){
                ?>
                <div class="container-small">
                <div class="candidate">
            <img src="../uploads/<?php echo $groups[$i]['photo']?>">
            <p>Name : <span><?php echo $groups[$i]['username']?></span></p>
            <p>Votes : <span><?php echo $groups[$i]['votes']?></span></p>
            
        </div>
        <form class="form" action="../actions/vote.php" method="POST">
            <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes']?>">
            <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id']?>">
            <?php
            if($status==1){
                ?>
                <button class="success">Voted</button>
                <?php
            }else{
                ?>
                <button type="submit" class="danger">Vote</button>
                <?php
            }
            ?>
        </form>
        </div>
        <?php
            }
            
        }else{
            ?>
            <h2>No Available Candidates!</h2>
            <?php
        }
        ?>

    </div>
</body>
</html>