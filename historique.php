<?php
    $i = 0;


    $title = 'Performance';
    include './template/header.php';

    $commandWarnings = "sudo /usr/local/bin/./warning.sh";
    
    exec($commandServInfo, $servInfo);
    exec($commandCPU, $cpu);
    exec($commandMemory, $memory);
    exec($commandDisk, $disk);
    exec($commandWarnings, $warnings);
?>


<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Historique des alertes</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-2">Date</th>
                        <th class="col-md-10">Message</th>
                    </thead>
                    <tbody>




                        <?php
                        foreach ($warnings as &$value): 
                            ?>
                            <tr>
                            <?php
                            $explode = explode(" ", $warnings[$i]);
                            $result = array_values(array_filter(array_map('trim', $explode), 'strlen'));
                
                            $myFinalString = "";
                            for($s=3; $s < count($result); $s++){
                                $myFinalString = $myFinalString." ".$result[$s];
                            }
			                ?>
                                <td><?=$result[0]." ".$result[1]." ".$result[2];?></td>
                                <td><?=$myFinalString;?></td>  
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                        ?>           
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
    include './template/footer.php';
?>
