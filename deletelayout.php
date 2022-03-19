<?php

if(isset($_GET["id"])){
    include "processor/connector.php";
$msg='';
    $delete_product_id= $_GET["id"];

    $result=$con->query("DELETE FROM layouts WHERE layout_id=$delete_product_id");
    if($result){
        $msg="Product deleted Successfully";
        echo $msg;
        header("location:index.php?page=adminPanel.php&task=layouts.php&msg=$msg");
        exit();
    }else{
        $msg="Error Occured: Product : ". $delete_product_id ."was not deleted";
    }
}

header("location:index.php?page=adminPanel.php&task=layouts.php&msg=$msg");
exit();

?>