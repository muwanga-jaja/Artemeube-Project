<?php
include "connector.php";
if(isset($_POST['submit'])){
    echo "<br>test line okay";
    $photo_name="code_name";
    $description="Code description";
    $sql="INSERT INTO `fashion`(`fashion_name`, `fashion_description`) VALUES ('$photo_name','$description')";
    $insert=$con->query("select * from fashion");
    echo "<br> query done";
}
?>