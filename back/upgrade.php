<?php
if(isset($_GET['username']) != "") {
    $username = $_GET['username'];
    exec('sudo usermod -aG sudo '.$username.' ');
    header('Location: ../views/user.php');
}
?>