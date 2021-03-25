<?php


class UsersController
{
    public function register()
    {
        if(isset($_POST['submit']))
        {
            $option=['cost'=>12];
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT,$option);

            $data=array(
                'fullname'=>$_POST['fullname'],
                'username'=>$_POST['username'],
                'password'=>$password
            );
            $result=User::addUser($data);
            if($result==='ok')
            {
                Session::set("success","Compte Creé");
                Redirect::to('login');
            }else{
                echo $result;
            }
        }
    }
    public function login()
    {
        if(isset($_POST['submit']))
        {
            $data['username']=$_POST['username'];
            $result=User::loginsearch($data);
            if($result->username===$_POST['username'] && password_verify($_POST['password'],$result->password))
            {
                $_SESSION['logged']=true;
                $_SESSION['username']=$result->username;
                Redirect::to('home');
            }else{
                Session::set('error','username or password wrong');
                Redirect::to('login');
            }
        }
    }
    static public function logout()
    {
        session_destroy();
    }
}