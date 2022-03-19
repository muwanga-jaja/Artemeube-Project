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
        <button onclick="gotoUpdate()" name="addProduct" class="button"> #UPdate </button>
        <button onclick="gotoDelete()" name="addProduct" class="button"> -Delete</button>
    </h2>
<p style="margin-top:-20px;display:block;color:bisque;float:right">
    <?php 
    if(isset($_GET["msg"])){
        echo $_GET["msg"];
    }
    ?> 
</p>
    <table class="fl-table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Fashion</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
include "processor/connector.php";
$sql="SELECT * FROM products";
$result= mysqli_query($con,$sql);
if($result->num_rows > 0){

    while($row=$result->fetch_assoc()){
                
        echo " <tr>";
        echo " <td>".$row["product_id"]."</td>";
        echo " <td>".$row["product_name"]."</td>";
        echo " <td>".$row["product_description"]."</td>";
        echo " <td>".$row["product_category"]."</td>";
        echo " <td>-Fashion Details-</td>";
        echo " <td>".$row["product_price"]."</td>";
        echo " <td style='font-size:10px'><b><h3><a href='deleting.php?id=".$row["product_id"]."'>Delete</a></h3></b></td>";
        echo " </tr>";

    }
}

            ?>
        <tbody>
    </table>
</div>