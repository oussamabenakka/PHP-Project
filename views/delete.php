<?php
if(isset($_POST['id']))
{
    $Employe=new EmployesContoller();
    $Employe->deleteEmployee();
}
?>