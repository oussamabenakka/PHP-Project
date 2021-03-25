<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home=new HomeController();
$pages=['home','add','update','delete','logout'];
if(isset($_SESSION['logged']) && $_SESSION['logged']===true)
{
    if(isset($_GET['page'])){
        if(in_array($_GET['page'],$pages)){
            $page=$_GET['page'];
            $home->index($_GET['page']);
        }
        else
        {
            $home->index('includes/404');
        }
    }else
    {
        $home->index('home');
    }
}else if (isset($_GET['page']) && $_GET['page']==='register')
{
    $home->index('includes/register');
}else
{
    $home->index('includes/login');
}
?>
<?php
require_once './views/includes/footer.php';
?>



