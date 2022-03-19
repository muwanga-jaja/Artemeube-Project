<link rel="stylesheet" type="text/css" href="layoutStyle.css">
<style>
 form{
     margin-top:80px;
 }
 h3{
     text-align:center;
 }
 .layout-div{
     margin-top:10%;
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

<div class="layout-div">
<h2> Upload layout</h2>
<?php
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>
<form method="post" enctype="multipart/form-data" action="processor/layoutUploader.php">
<div class="center">
        <div class="form-input">
            <div class="preview">
                <img id="file-ip-1-preview">
                <input type="submit" name="" value="">

                <label for="file-ip-1">select Layout</label>
                <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

            </div>
        </div>
        <input type="submit" name="submit_layout" class="button" value="submit " >
</form>
</div>