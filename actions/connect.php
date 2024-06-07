<?php
$con = new mysqli('localhost', 'root', 'ridham@2003', 'voting');
if (!$con) {
    die(mysqli_error($con));
}
?>