<?php
class Employe
{
    //get all employees
    static public function getAll()
    {
         $stmt=DB::connect()->prepare('select * from emplyes');
         $stmt->execute();
         return $stmt->fetchAll();
         $stmt->close();
         $stmt=null;
    }
    //add an employee
    static  public  function add($data)
    {
        $stmt=DB::connect()->prepare('INSERT INTO emplyes (nom,prenom,matricule,depart,poste,date_emb,statue) values (:nom,:prenom,:matricule,:depart,:poste,:date_emb,:statue)');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':matricule',$data['matricule']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':poste',$data['poste']);
        $stmt->bindParam(':date_emb',$data['date_emb']);
        $stmt->bindParam(':statue',$data['statue']);
        if($stmt->execute())
        {
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;
    }
    //update employee
    static  public  function update($data)
    {
        $stmt=DB::connect()->prepare('update emplyes set nom=:nom,prenom=:prenom,matricule=:matricule,depart=:depart,poste=:poste,date_emb=:date_emb,statue=:statue where id=:id');
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':matricule',$data['matricule']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':poste',$data['poste']);
        $stmt->bindParam(':date_emb',$data['date_emb']);
        $stmt->bindParam(':statue',$data['statue']);
        if($stmt->execute())
        {
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;
    }
    //get one employee
    static  public  function getOneEmployee($data)
    {
        $id=$data['id'];
        try {
            $stmt=DB::connect()->prepare('SELECT * FROM  emplyes  WHERE id=:id');
            $stmt->execute(array(":id"=>$id));
            $employe=$stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        }catch (PDOException $ex)
        {
            $ex->getMessage();
        }
    }
    static public function delete($data)
    {
        $id=$data['id'];
        try {
            $query = 'delete from emplyes where id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if($stmt->execute())
            {
                return 'ok';
            }
        }catch (PDOException $ex)
        {
            $ex->getMessage();
        }
    }
    static public function search($data)
    {
        $search=$data['search'];
        try {
            $query = 'select * from emplyes where nom like ? or prenom like ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
            return $employees=$stmt->fetchAll();
        }catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
}