<?php
include ('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$type = $_POST['type'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

if($password != $cpassword){
    echo "<script>
    alert('Password do no match!');
    window.location = '../partials/registration.php'
    </script>";
}else{
    move_uploaded_file($tmp_name,"../uploads/$image");
    $sql = "insert into `userdata` (username,mobile,password,photo,type,status,votes) values ('$username','$mobile','$password','$image','$type',0,0)";

    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>
    alert('Registration Successful!');
    window.location = '../index.php'
    </script>";
    }
}

?>