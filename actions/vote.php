<?php
session_start();
include ('connect.php');

$votes = $_POST['groupvotes'];
$totalVotes = $votes+1;

$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

$updateVotes = mysqli_query($con,"update `userdata` set votes='$totalVotes' where id='$gid'");
$updateStatus = mysqli_query($con,"update `userdata` set  status=1 where id='$uid'");

if($updateVotes and $updateStatus){
    $getgroups = mysqli_query($con,"select username,photo,id,votes from `userdata` where type='group'");
    $groups = mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] = 1;
    echo "<script>
    alert('Voting Successful !')
    window.location = '../partials/dashboard.php'
    </script>";

}else{
    echo "<script>
    alert('Technical error ! Please vote after sometime.')
    window.location = '../partials/dashboard.php'
    </script>";
}

?>