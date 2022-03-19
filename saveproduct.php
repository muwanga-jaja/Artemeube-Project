<?php
//making connection to db
   include "processor/connector.php";
//code to save new product information to db
if (isset($_GET["save_product"])) {
    //echo "saving product";

    $product_name=$_GET["product_name"];
    $product_description=$_GET["product_description"];
    $product_category=$_GET["product_category"];
    $product_style=$_GET["fashion"];
    $product_price=$_GET["product_price"];
    $product_design=$_GET["design"];
    $product_length=$_GET["length"];
    $product_width=$_GET["width"];
    $product_height=$_GET["height"];
    //last inserted-id to mysql database-artemeube database
    $last_insert_id;

    //status messages about the posted Image to database
    $status = $statusMsg = "";

    //maing sql statements
   
    $sql="INSERT INTO `products`(`product_name`, `product_description`, `product_category`, `product_style`, `product_price`)
                    VALUES ('$product_name','$product_description','$product_category','$product_style','$product_price')";
    // $sql2="INSERT INTO `photo`(`photo_image`, `photo_name`, `photo_description`)
    //                  VALUES ('$product_photo','[value-3]','$product_description')";
     $result= mysqli_query($con,$sql) or die(mysqli_error($con));
    if($result){
       
        //getting the last inserted_id
        $last_insert_id = mysqli_insert_id($con);
        $statusMsg="Product Saved:  ".$last_insert_id;
        echo $last_insert_id;
       
        //inserting dimensions with last_insert_id from the products table
        $sql_dimensions="INSERT INTO `dimensions`(`product_id`, `length`, `width`, `height`)
                    VALUES ('$last_insert_id','$product_length','$product_width','$product_height')";
        //make the query        
        $dimensions_result=mysqli_query($con,$sql_dimensions);

        if($dimensions_result){
            $sql_designs="INSERT INTO `designs`(`product_id`, `design_name`) 
                        VALUES ('$last_insert_id','$product_design')";
                //making the query
                $design_result=mysqli_query($con,$sql_designs) or die(mysqli_error($con));
                
                if($design_result){
                    // now saving image for the product and design

                   
                }
        }
       
    }else{
        echo "<br>all the SQL statements failed to save in DB";
    }



    //saving images::: for the product and the design

    //product
    $status = "error";

    if (!empty($_FILES["product_image"]["name"])) {
        //getting file info
        $fileName = basename($_FILES["product_image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        //allowing file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
        $image        = $_FILES['product_image']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
        $withoutExtion = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
        //saving image to mysql database--> photo table

        $sql = "INSERT INTO `photo`(`photo_id`, `photo_name`, `photo_description`, `photo_image`) 
                        VALUES ('$last_insert_id','$withoutExtion','$product_name','$imageContent')";
        $insert = $con->query($sql);

        //if all connection and inserting was successful
        if ($insert) {
            //status flag set to success
            $status    = "success";
            $statusMsg = "File uploaded Successfully";
            //echo $statusMsg;
          

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
    $statusMsg = "Please select an Image File to uploadx";
    
    }
    echo $statusMsg;
    //now saving Design image to designs table

    header("location:index.php?page=adminPanel.php&task=addProductPhoto.php");
    exit();

}
?>