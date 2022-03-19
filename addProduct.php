
<style>
@import url("general.css");
</style>

<script>
var colors = ['1abc9c', '2c3e50', '2980b9', '7f8c8d', 'f1c40f', 'd35400', '27ae60'];

colors.each(function(color) {
    $$('.color-picker')[0].insert(
        '<div class="square" style="background: #' + color + '"></div>'
    );
});

$$('.color-picker')[0].on('click', '.square', function(event, square) {
    background = square.getStyle('background');
    $$('.custom-dropdown select').each(function(dropdown) {
        dropdown.setStyle({
            'background': background
        });
    });
});
</script>
<style>

</style>

<!-- start of body-->
<div class="container-register-products">
    <form action="index.php" class=" " enctype="multipart/form-data">
        <span>
            <h1>New Product</h1>
        </span>

        <input type="text" hidden name="page" value="adminPanel.php" />
        <input type="text" hidden name="task" value="registerProduct.php" />
        <input type="text" hidden name="product_name" />
        <input type="text" placeholder="Product Name" name="product_name" />
        <input type="text" placeholder="Product Description" name="product_description" />
        <span class="custom-dropdown ">
            <select name="category">
                <option value="Custom_Made_Furniture">Custom Made Furniture</option>
                <option value="One_Piece_of_Art">One Piece of Art</option>
            </select>
        </span>
        <span class="custom-dropdown ">
            <select name="fushion">
                <option value="classical">Classical</option>
                <option value="Modern">Modern</option>
                <option value="Contemporary">Contemporary</option>
            </select>
        </span>
        <input type="number" name="product_price" placeholder="Price=5000AED" />
        <label for="product_photo" style="color:black;align:left;">Upload Photo</label>
            <input type="file" placeholder="Price=5000AED" name="product_photo" />

            <button type="submit" name="save_product">Save</button>
    </form>

</div>
<?php
//code to save new product information to db
if(isset($_GET["save_product"])){
//echo "saving product";

    $product_name=$_GET["product_name"];
    $product_description=$_GET["product_description"];
    $product_category=$_GET["category"];
    $product_fushion=$_GET["fushion"];
    $product_price=$_GET["product_price"];
    $product_photo=$_GET["product_photo"];

    //making connection to db
    include "processor/connector.php";

    //maing sql statements
    $sql="INSERT INTO `products`( `product_name`, `product_description`, `product_category`, `product_fushion`, `product_price`)
                    VALUES ('$product_name','$product_description','$product_category','$product_fushion','$product_price')";
    $sql2="INSERT INTO `photo`(`photo_image`, `photo_name`, `photo_description`) 
                    VALUES ('$product_photo','[value-3]','$product_description')";
    $result= mysqli_query($con,$sql);
        if($result){
            echo "<br>data Inserted<br>";
            echo $product_name;
            echo $product_description;
            echo $product_category;
            echo $product_fushion;
          savePhotoToDB();
      
        }
  
        header("location:../index.php?page=markDimension.php&msg=$statusMsg");
        exit();
}

function savePhotoToDB(){
    $status = $statusMsg = "";
if ($_FILES["product_photo"]) {
    echo "<br>";
    echo "File Submitted...$product_photo";
 $status = "error";

 if (!empty($_FILES["product_photo"]["name"])) {
  //getting file info
  $fileName = basename($_FILES["product_photo"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  if (isset($fileName)) {
      echo "<br>";
      echo "Photo received...+$fileName";
  }
  //allowing file formats
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (in_array($fileType, $allowTypes)) {
   $image        = $_FILES['product_photo']['tmp_name'];
   $imageContent = addslashes(file_get_contents($image));

   //saving image to mysql database

   $photo_sql = "INSERT INTO `photo` (`photo_name`, `photo_description`, `photo_image`)
                    VALUES ('$fileName', '$fileType', '$imageContent')";
   $insert = $con->query($photo_sql);

   //if all connection and inserting was successful
   if ($insert) {
    //status flag set to success
    echo "<br>photo_table selected";
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
}
?>