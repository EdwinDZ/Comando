<?php
if(isset($_GET['id']) && $_GET['id'] != "") {
    var_dump(exec("sudo kill -9 " . $_GET['id']));
    header('Location: ../views/process.php');
    
}

?>
