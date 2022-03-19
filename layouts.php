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


    <table class="fl-table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
include "processor/connector.php";
//$sql="SELECT * FROM products p, dimensions d WHERE p.product_id=d.product_id";
$sql="SELECT * FROM layouts";
$result= mysqli_query($con,$sql);
if($result){
    echo "sql: successful";
}else{
    echo "bad sql";
}
 if($result-> num_rows > 0){
     while ($row=mysqli_fetch_array($result)) {
         echo " <tr>";
         echo " <td>".$row["layout_id"]."</td>";
         echo " <td><img src='data:image/jpg;charset=utf8;base64,". base64_encode($row['layout_image'])."' width='100px' height='70px' /></td>";
         echo " <td>".$row["layout_name"]."</td>";
         echo " <td><a href='deletelayout.php?id=".$row["layout_id"]."'>Delete</a></td>";
         echo " </tr>";
     }
 }
            ?>
        <tbody>
    </table>
  <!--  <button style="float:right"onclick="gotoDelete()" name="addProduct" class="button"> -Delete</button> -->
</div>
