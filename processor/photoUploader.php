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
        //products table gives us the last desc product id.
        $sql_pdt_id="SELECT products.product_id, dimensions.product_id
                     FROM products 
                     INNER JOIN dimensions
                     ON products.product_id=dimensions.product_id
                     ORDER BY products.product_ID DESC LIMIT 1";
        $result_id=$con->query($sql_pdt_id) or die(mysqli_error($con));
        $new_id=mysqli_fetch_row($result_id);
       //$result_id=$con-> insert_id;
        //saving image to mysql database

        //id of the same object to be saved in photo table == is the last (and ) same id
        // of the last product inserted in that products table
        $id=$new_id[0];
echo $id;
        $sql = "INSERT INTO `photo` (`photo_id`, `photo_name`, `photo_image`) 
                            VALUES ('$id','$withoutExtion', '$imageContent')";
        $insert = $con->query($sql);

        //if all connection and inserting was successful
        if ($insert) {
            //status flag set to success
            $status    = "success";
            $statusMsg = "File uploaded Successfully";
            //echo $statusMsg;
            header("location:../index.php?page=adminPanel.php&task=addDesignPhoto.php&msg=$statusMsg");
            exit();

        } else {
            $statusMsg = "<br>File upload Failed. Please retry $id";
            
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
    header("location:../index.php?page=adminPanel.php&task=newProduct.php&msg=$statusMsg");
            exit();
}

//product-image --sent from upload photo
if(isset($_POST['submit_design'])){
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
        //products table gives us the last desc product id.
        $sql_pdt_id="SELECT products.product_id, dimensions.product_id
                     FROM products 
                     INNER JOIN dimensions
                     ON products.product_id=dimensions.product_id
                     ORDER BY dimensions.product_Id DESC LIMIT 1";
        $result_id=$con->query($sql_pdt_id) or die(mysqli_error($con));
        $new_id=mysqli_fetch_row($result_id);
       //$result_id=$con-> insert_id;
        //saving image to mysql database

        //id of the same object to be saved in photo table == is the last (and ) same id
        // of the last product inserted in that products table
        $id=$new_id[0];
echo $id;
        $sql = "INSERT INTO `designs` (`product_id`, `design_name`, `design_image`)
                            VALUES ('$id','$withoutExtion', '$imageContent')";
        $insert = $con->query($sql);

        //if all connection and inserting was successful
        if ($insert) {
            //status flag set to success
            $status    = "success";
            $statusMsg = "File uploaded Successfully";
            //echo $statusMsg;
            header("location:../index.php?page=adminPanel.php&msg=$statusMsg");
            exit();

        } else {
            $statusMsg = "<br>File upload Failed. Please retry $id";
            
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
    header("location:../index.php?page=adminPanel.php&task=addDesignPhoto.php&msg=$statusMsg");
            exit();
}
close_connection($con);

//echo $statusMsg;
header("location:../index.php?page=adminPanel.php&task=addDesignPhoto.php&msg=$statusMsg");
exit();