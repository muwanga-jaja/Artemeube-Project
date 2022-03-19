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
.container-register-products {
    height: auto;
}

.container-register-products>form {
    margin-top: -30px;
    height: 100%;
    padding: 20px 85px;
    color: black;
}
</style>

<!-- start of body-->
<div class="container-register-products">
    <form action="saveProduct.php" class=" " enctype="multipart/form-data">
        <span>
            <h1>New Item</h1>
        </span>

        <input type="text" hidden name="page" value="adminPanel.php" />
        <input type="text" hidden name="task" value="registerProduct.php" />
        <input type="text" placeholder="Product Name" name="product_name" />
        <input type="text" placeholder="Product Description" name="product_description" />
       
        <span class="custom-dropdown ">
            <select name="product_category">
                <option value="Custom Made Furniture">Custom Made Furniture</option>
                <option value="One Piece of Art">One Piece of Art</option>
            </select>
        </span>
        <span class="custom-dropdown ">
            <select name="fashion">
                <option value="classical">Classical</option>
                <option value="Modern">Modern</option>
                <option value="Contemporary">Contemporary</option>
            </select>
        </span>
        <span class="custom-dropdown ">
            <select name="design">
            <option value="plain / no design">No Design / Just pain</option>
            <option value="classical">Abstract</option>
                <option value="Colored">Colored</option>
                <option value="Black & white">Black and White</option>
                <option value="Striped">striped</option>
                <option value="Triangular">Tringular</option>
                <option value="Contemporary">Circular</option>
            </select>
        </span>
        
        <input type="number" name="product_price" placeholder="Price=5000AED" />
        <input type="number" name="length" placeholder="Length" />
        <input type="number" name="width" placeholder="width" />
        <input type="number" name="height" placeholder="Height" />
      
        
        <button type="submit" name="save_product">Save</button>
    </form>

</div>

