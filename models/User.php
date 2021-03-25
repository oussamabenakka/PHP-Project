<?php


class User
{
     static public function  addUser($data)
     {
         $stmt=DB::connect()->prepare('INSERT INTO users (fullname,username,password) values (:fullname,:username,:password)');
         $stmt->bindParam(':fullname',$data['fullname']);
         $stmt->bindParam(':username',$data['username']);
         $stmt->bindParam(':password',$data['password']);
         if($stmt->execute()){
             return 'ok';
         }else{
             return 'error';
         }
         $stmt->close();
         $stmt=null;
     }
     static public function loginsearch($data)
     {
         $username=$data['username'];
         try {
             $stmt=DB::connect()->prepare('select * from users where username=:username');
             $stmt->execute(array(":username"=>$username));
             $user=$stmt->fetch(PDO::FETCH_OBJ);
             return $user;
             if($stmt->execute())
             {
                 return 'ok';
             }
         }catch (PDOException $e)
         {
           echo $e->getMessage();
         }
     }

}