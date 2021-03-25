<?php
if(isset($_POST['id']))
{
    $Employe=new EmployesContoller();
    $employee=$Employe->getOneEmployee();
}else
{
    Redirect::to('home');
}
if(isset($_POST['submit']))
{
    $Employe=new EmployesContoller();
    $updateemployee=$Employe->updateEmploye();
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="card-header mb-2">Modifier un employé</div>
                    <a href="<?php echo BASE_URL?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="post">
                        <div class="form-group mb-2">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" class="form-control" value="<?php echo $employee->nom ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="prenom">Prénom*</label>
                            <input type="text" name="prenom" class="form-control" value="<?php echo $employee->prenom ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="matricule">Matricule*</label>
                            <input type="text" name="matricule" class="form-control" value="<?php echo $employee->matricule ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="depart">Département*</label>
                            <input type="text" name="depart" class="form-control" value="<?php echo $employee->depart ?>">
                            <input type="hidden" name="id" value="<?php echo $employee->id?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="poste">Poste*</label>
                            <input type="text" name="poste" class="form-control" value="<?php echo $employee->poste ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="date_emb">Date Embauche*</label>
                            <input type="date" name="date_emb" class="form-control" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="statue">statut*</label>
                            <select class="form-control" name="statue">
                                <option value="1" <?php echo $employee->statue ?'selected':'' ?>>Active</option>
                                <option value="0" <?php echo !$employee->statue ?'selected':'' ?>>Résilié</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary " name="submit">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
