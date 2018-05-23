<?php
    $i = 0;
    $title = 'Processus';

    include './template/header.php';

    $command = "ps auxc | sed 's/\W\+/ /g' | sed 1d";
    exec($command, $process);
?>

<div class="col-md-12">
    <div class="card card-plain">
        <div class="header">
            <h4 class="title">Liste des processus</h4>
            <p class="category">En cours d'exécution ...</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th>User</th>
                    <th>PID</th>
                    <th>%CPU</th>
                    <th>%MEM</th>
                    <th>VSZ</th>
                    <th>RSS</th>
                    <th>TTY</th>
                    <th>Stat</th>
                    <th>Started</th>
                    <th>Time</th>
                    <th>Command</th>
                    <th></th>
                    <th>Kill</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($process as &$value): 
                        ?>
                        <tr>
                        <?php
                        $explode = explode(" ", $process[$i]);
                        $result = array_values(array_filter(array_map('trim', $explode), 'strlen'));
                        ?>
                            <td><?=$result[0];?></td>
                            <td><?=$result[1];?></td>
                            <td><?=$result[2];?></td>
                            <td><?=$result[3];?></td>
                            <td><?=$result[4];?></td>
                            <td><?=$result[5];?></td>
                            <td><?=$result[6];?></td>
                            <td><?=$result[7];?></td>
                            <td><?=$result[8];?></td>
                            <td><?=$result[9];?></td>
                            <td><?=$result[10];?></td>        
                            <td><?=$result[12];?></td>
                            <td style="color:red !important">
                            <a href="../back/process.php?id=<?=$result[1];?>">
                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </a>
                            </td>
                         
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

<?php
    include './template/footer.php';
?>