<style>


</style>

<script>
function gotoPage() {
    window.location.href = "index.php?page=adminPanel.php&task=registerProduct.php&add=addPdt";
}
function gotoUpdate() {
    window.location.href = "index.php?page=adminPanel.php&task=updateProduct.php&add=addPdt";
}
function gotoDelete() {
    window.location.href = "index.php?page=adminPanel.php&task=deleteProduct.php&add=addPdt";
}
</script>

<div class="table-wrapper">
<h2>Products[chairs,tables...] <button onclick="gotoPage()" name="addProduct" class="button"> + Add </button>
<button onclick="gotoUpdate()" name="addProduct" class="button">  #UPdate </button>
<button onclick="gotoDelete()" name="addProduct" class="button"> -Delete</button> </h2>

    <table class="fl-table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Fashion</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
include "processor/connector.php";
//$sql="SELECT * FROM products p, dimensions d WHERE p.product_id=d.product_id";
$sql="SELECT products.product_id,
            products.product_name,
            products.product_description,
            products.product_category,
            products.product_style,
            products.product_price,
            dimensions.length,
            dimensions.width,
            dimensions.height,
            photo.photo_image
            FROM products
       JOIN dimensions  on products.product_id = dimensions.product_id
       JOIN photo on dimensions.product_id = photo.photo_id";
$result= mysqli_query($con,$sql) or die(mysqli_error($con));
if($result){
    echo "sql: successful";
}else{
    echo "bad sql";
}
 if($result-> num_rows > 0){
     while ($row=mysqli_fetch_array($result)) {
         echo " <tr>";
         echo " <td>".$row["product_id"]."</td>";
         echo " <td>".$row["product_name"]."</td>";
         echo " <td>".$row["length"]." * ".$row["width"]." * ".$row["height"]."</td>";
         echo " <td>".$row["product_category"]."</td>";
         echo " <td>".$row["product_style"]."</td>";
         echo " <td><img src='data:image/jpg;charset=utf8;base64,";
         echo base64_encode($row["photo_image"]);
         echo "' width='50px' height='50px'/> </td>";
         echo " <td>".$row["product_price"]."</td>";
         echo " <td>+Photo</td>";
         echo " </tr>";
     }
 }
            ?>
        <tbody>
    </table>
</div>
