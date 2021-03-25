<?php
if(isset($_POST['submit']))
{
    $data=new UsersController();
    $user=$data->register();
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php include('./views/includes/alerts.php');?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Inscription</h3>
                </div>
                <div class="card-body bg-light">
                    <form METHOD="post" class="mr-1">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <button class="btn btn-primary btn-sm" name="submit" type="submit">Inscription</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL?>login" class="btn btn-link">Connexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
