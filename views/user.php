<?php
    $i = 0;
    $a = 0;
    $title = 'Utilisateurs';
    
    include './template/header.php';
    $command = "grep bash /etc/passwd | cut -f1 -d: ";
    $command2 = "grep '^sudo:.*$' /etc/group | cut -d: -f4";
    exec($command, $usersList);
    exec($command2, $usersList2);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Créer un nouvel utilisateur</h4>
            </div>
            <div class="content">
                <form action="../back/user.php" method="post" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom de l'utilisateur</label>
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" value="">
                               
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="">
                            </div>
                        </div>
                      
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Créer l'utilisateur</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Liste des utilisateurs</h4>
                <p class="category">Utilisateurs enregistrés sur le serveur ...</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-10">Nom d'utilisateur</th>
                        <th class="col-md-2"></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usersList as &$value): 
                            ?>
                            <tr>
                            <?php
                            $explode = explode(" ", $usersList[$i]);
                            $result = array_values(array_filter(array_map('trim', $explode), 'strlen'));
                            ?>
                                <td><?=$result[0];?></td>
                               
    
                                <td>

                                <?php
                                if($result[0] != root):
                                ?>


                                <a href="./edit.php?username=<?=$result[0];?>">
                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>

                                &nbsp;

                                <a href="../back/upgrade.php?username=<?=$result[0];?>">
                                <button type="button" rel="tooltip" title="" class="btn btn-warning btn-simple btn-xs" data-original-title="Edit">
                                    <i class="fa fa-level-up"></i>
                                </button>
                                
                                &nbsp;

                                <a href="../back/delete_user.php?username=<?=$result[0];?>">
                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>

                                <?php
                                endif;
                                ?>
                                </td>
                            
                            </tr>


                            <!-- Modal 
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Modification d'utilisateur</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../back/user.php" method="post" >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nom de l'utilisateur</label>
                                                        
                                                            <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Mot de passe</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Valider</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>

-->
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


<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">Liste des sudoers</h4>
                <p class="category">Utilisateurs enregistrés sur le serveur ...</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-10">Nom d'utilisateur</th>
                        <th class="col-md-2"></th>
                    </thead>
                    <tbody>
                    

                        <?php
                        $explode = explode(",", $usersList2[$a]);
                        $result2 = array_values(array_filter(array_map('trim', $explode), 'strlen'));
                        foreach ($result2 as &$value2): 
                            ?>
                            <tr>
                            <?php
                            
                            ?>
                                <td><?=$value2;?></td>
                                <td style="color:red !important">

                                <?php
                                if($result2[0] != root):
                                ?>
                                <a href="../back/user.php?username=<?=$result2[0];?>">
                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                                <?php
                                endif;
                                ?>
                                </td>
                            
                            </tr>
                            <?php
                            $a++;
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