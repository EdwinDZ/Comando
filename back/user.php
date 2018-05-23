<?php
if(isset($_POST['username']) && $_POST['password'] != "") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    exec('sudo adduser '.$username.' --gecos "First Last,RoomNumber,WorkPhone,HomePhone" --disabled-password; echo "'.$username.':'.$password.'" | sudo chpasswd');
    header('Location: ../views/user.php');
}
?>