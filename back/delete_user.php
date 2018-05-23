<?php
if(isset($_GET['username']) != "") {
    $username = $_GET['username'];
    exec('sudo deluser '.$username.' ');
    header('Location: ../views/user.php');
}
?>