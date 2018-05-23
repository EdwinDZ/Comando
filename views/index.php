<?php
    $i = 0;


    $title = 'Performance';
    include './template/header.php';

    $commandServInfo = "/usr/local/bin/./opSys.sh";
    $commandCPU = "/usr/local/bin/./procUse.sh";
    $commandMemory = "/usr/local/bin/./memUse.sh";
    $commandDisk = "/usr/local/bin/./diskUse.sh";
    $commandWarnings = "sudo /usr/local/bin/./warning.sh";
    
    exec($commandServInfo, $servInfo);
    exec($commandCPU, $cpu);
    exec($commandMemory, $memory);
    exec($commandDisk, $disk);
    exec($commandWarnings, $warnings);

    $warnings = array_reverse($warnings);
    $warnings = array_slice($warnings, 0, 40);
?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="header">
                <h4 class="title">Infos serveur</h4>
            </div>
            <div class="content">
                <ul>
                    <li><?=$servInfo[1];?></li>
                    <li><?=$servInfo[2];?></li>
                    <li><?=$servInfo[3];?></li>
                    <li><?=$servInfo[0];?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="header">
                <h4 class="title">CPU</h4>
            </div>
            <div class="content">
            <ul>
                    <li><?=$cpu[2]." : ". $cpu[4]." %";?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="header">
                <h4 class="title">Disque</h4>
            </div>
            <div class="content">
                <ul>
                    <li><?=$disk[0];?> </li>
                    <li><?=$disk[1];?> </li>
                    <li><?=$disk[2];?> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="header">
                <h4 class="title">Mémoire</h4>
            </div>
            <div class="content">
                <ul>
                    <li><?=$memory[1];?></li>
                    <li><?=$memory[2];?></li>
                    <li><?=$memory[3];?></li>
                </ul>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Liste des alertes</h4>
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
