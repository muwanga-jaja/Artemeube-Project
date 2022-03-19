<style>
.update_table {
    margin-top: -350px;
}
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

<div class="update_table">
    <h2>Products[chairs,tables...] <button onclick="gotoPage()" name="addProduct" class="button"> + Add </button>
        <button onclick="gotoUpdate()" name="addProduct" class="button"> #UPdate </button>
        <button onclick="gotoDelete()" name="addProduct" class="button"> -Delete</button>
    </h2>

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
        ?>
            <form name="update_products" action="index.php?page=admin.php&task=updateProduct.php" method="POST">
                <input type="text" name="page" value="admin.php" hidden>
                <input type="text" name="task" value="adminPanel.php" hidden>
        <?php
      
        echo " <td>".$row["product_id"]."</td>";
        echo " <td><input type='text' name='product_name' size='15' value='".$row["product_name"]."' /></td>";
        echo " <td><input type='text' name='product_description' size='15' value='".$row["product_description"]."' /></td>";
        echo " <td><input type='text' name='product_category' size='15' value='".$row["product_category"]."' /></td>";
        echo " <td><input type='text' name='product_fushion' value='".$row["product_fushion"]."' /></td>";
        echo " <td><input type='text' name='product_price' value='".$row["product_price"]."' /></td>";
        echo " <td><button type='submit'> Update</button></td>";
        echo " </form></tr>";

    }
}

            ?>
        <tbody>
    </table>
</div>