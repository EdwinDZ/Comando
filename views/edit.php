<?php
  if(isset($_GET['username']) != "") {
    $username = $_GET['username'];

  include './template/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Modifier un utilisateur</h4>
            </div>
            <div class="content">
                <form action="../back/update_user.php" method="post" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <input  name="original_username" type="hidden" value="<?php echo $username; ?>">
                                <label>Nom de l'utilisateur</label>
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" value="<?php echo $username; ?>">
                               
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="">
                            </div>
                        </div>
                      
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Modifier l'utilisateur</button>
                    <div class="clearfix"></div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php

    include './template/footer.php';
  }
?>