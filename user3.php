<?php

$data = ["root","admin"];
$i = 0;
foreach ($data as $value) {

    exec("grep $value /etc/group", $output);
    var_dump($output);
    $explode = explode(":", $output[$i]);
    $i++;

   
    ?>
    <pre>
    <?php var_dump($explode); ?>
    <pre>
    <?php
}

