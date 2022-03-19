<?php
//code to save new product information to db
if(isset($_GET["save_product"])){
echo "saving product";
}
?>
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
.image_resizer {
    width: 200px;
    height: 200px;
    margin-top: -60px;
    padding: 10px
}

.container-register {
    color:black;
    width: 500px;
    height: 100%;
    margin-top: -400px;
    margin-left: 25%;
}
</style>

<script type="text/javascript">
function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "flex";
    }
}
</script>

<!-- start of body-->
<div class="container-register">
    <form method="post" enctype="multipart/form-data" action="processor/photoUploader.php">
    <h3 style="padding:10px;width:200px; margin-bottom:40px; margin-top:-70px;">Add Product Photo</h3>
        <div class="form-input">
            <div class="preview">
                <img id="file-ip-1-preview" src="images/image_placeholder.png" class="image_resizer" alt="" />

                <label for="file-ip-1">select Layout</label>
                <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

            </div>
        </div>
        <input type="submit" name="submit_layout" class="button" value="submit ">
    </form>

</div>
<img>

<?php
//code to save new product information to db
if(isset($_GET["save_product"])){

}
?>