<?php
 Include '../Controllers/Controllers.php';
if(isset($_POST['ProjectID'])){
    $ProjectID = $_POST['ProjectID'];
    $con = new Controllers();
    $result = $con->deleteProject($ProjectID);
    if($result){
        return true;
    }else{
        return false;
    }
}
?>