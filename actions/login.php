<?php
include ('connect.php');
session_start();

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$type = $_POST['type'];

 $sql = "select * from `userdata` where username='$username' and password='$password' and type='$type' and mobile='$mobile'";
 $result = mysqli_query($con,$sql);
 if (mysqli_num_rows($result) > 0) {
    $sql = 'select username,id,photo,votes from `userdata` where type="group"';
    $resultGroup = mysqli_query($con,$sql);
    if(mysqli_num_rows($resultGroup) > 0) {
        $groups = mysqli_fetch_all($resultGroup, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
    }
    $data = mysqli_fetch_array($result);
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;

    echo "<script>
    window.location = '../partials/dashboard.php'
    </script>";

 }else{
    echo "<script>
    alert('Invalid Credentials!');
    window.location = '../index.php'
    </script>";
 }


?>