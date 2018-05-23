<?php


exec("for user in $(awk -F: '{print $1}' /etc/passwd); do groups $user; done", $output);
//var_dump($output);
//var_dump($output);
$i = 0;
foreach ($output as &$value) {
    $explode = explode(":", $output[$i]);
    $i++;
    $result = array_values(array_filter(array_map('trim', $explode), 'strlen'));
    ?>
    <pre>
    <?php var_dump($result); ?>
    <pre>
    <?php
}
unset($value);
var_dump($output)
?>





