<?php
//include_once "dbconnector.php";
include_once "connector.php";
echo "<br>";

//checking for the method type
$status = $statusMsg = "";
if (isset($_POST['submit_layout'])) {
    echo "File Submitted.";
    $status = "error";

    if (!empty($_FILES["image"]["name"])) {
        //getting file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        //allowing file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
        $image        = $_FILES['image']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
        $withoutExtion = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
        //saving image to mysql database

        $sql = "INSERT INTO `layouts` (`layout_name`, `layout_image`)
                            VALUES ('$withoutExtion', '$imageContent')";
        $insert = $con->query($sql);

        //if all connection and inserting was successful
        if ($insert) {
            //status flag set to success
            $status    = "success";
            $statusMsg = "File uploaded Successfully";
            //echo $statusMsg;
            header("location:../index.php?page=markDimension.php&msg=$statusMsg");
            exit();

        } else {
            $statusMsg = "<br>File upload Failed. Please retry";
            
        }
        if (!$insert) {
            echo "<br>";
            echo "Problem on: database . Table selection";
            echo "<br>";
        }
        } else {
        $statusMsg = "Sorry, Only JPG, JPEG, PNG and GIF file formats are allowed to upload";
        }
    } else {
    $statusMsg = "Please select an Image File to upload";
    }
}

//product-image --sent from upload photo
if(isset($_POST[''])){

}
close_connection($con);

//echo $statusMsg;
header("location:../index.php?page=artPiece.php&msg=$statusMsg");
exit();