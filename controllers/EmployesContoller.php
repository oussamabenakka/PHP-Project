<?php
class EmployesContoller{
    public function getAllEmployes()
    {
        return Employe::getAll();
    }
    public function addEmploye()
    {
        if(isset($_POST['submit']))
        {
            $data=array(
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'matricule'=>$_POST['matricule'],
                'depart'=>$_POST['depart'],
                'poste'=>$_POST['poste'],
                'date_emb'=>$_POST['date_emb'],
                'statue'=>$_POST['statue']
            );
            $result=Employe::add($data);
            if($result==='ok')
            {
                Session::set("success","Employé Ajouté");
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }
    public function getOneEmployee()
    {
        if(isset($_POST['id'])) {
            $data=array(
                'id'=>$_POST['id']
            );
            $employee=Employe::getOneEmployee($data);
            return $employee;
        }
    }
    public function updateEmploye()
    {
        if(isset($_POST['submit']))
        {
            $data=array(
                'id'=>$_POST['id'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'matricule'=>$_POST['matricule'],
                'depart'=>$_POST['depart'],
                'poste'=>$_POST['poste'],
                'date_emb'=>$_POST['date_emb'],
                'statue'=>$_POST['statue']
            );
            $result=Employe::update($data);
            if($result==='ok')
            {
                Session::set("success","Employé Modifié");
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }
    public function deleteEmployee()
    {
        if(isset($_POST['id']))
        {
            $data['id']=$_POST['id'];
            $result=Employe::delete($data);
            if($result==='ok')
            {
                Session::set("success","Employé est Supprimé");
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }
    public function findEmployee()
    {
        if(isset($_POST['search']))
        {
            $data=array('search'=>$_POST['search']);
        }
        $employee=Employe::search($data);
        return $employee;
    }
}
