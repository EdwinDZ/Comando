<?php
if(isset($_POST['username']) && $_POST['password'] && $_POST['original_username'] != "") {
    $old_user = $_POST['original_username'];
    $username = str_replace(' ', '', $_POST['username']);
    $password = $_POST['password'];

    exec('sudo usermod --login '.$username.' '.$old_user.'; echo '.$username.':'.$password.' | sudo chpasswd');
    header('Location: ../views/user.php');
}


?>

