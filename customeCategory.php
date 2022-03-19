<script type="text/javascript">
function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}

function gotoUploader() {
    window.location.href = "index.php?page=uploadLayout.php";
}
</script>
<div class="lefter">
    <div class="form-input">
    <?php
        $message = "";
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            echo $message;
        }
    ?>
      <!--  <button class="button" onClick="gotoUploader()">Upload Layout</button> -->


    </div>
    <div>

    </div>
</div>
<br>
<div class="lefter-button">
    <a href="index.php?page=uploadLayout.php">
        <button class=" button "> Upload Layout</button>
    </a>
    </div>
<div class="container">
    <a href="index.php?page=classicalProducts.php" class="boximg">
        <img src="images/classical.png" alt="">
        <span>Classical</span>
    </a>
    <a href="index.php?page=modernProducts.php" class="boximg">
        <img src="images/modern.png">
        <span>Modern</span>
    </a>
    <a href="index.php?page=contemporaryProducts.php" class="boximg">
        <img src="images/contemporary.png">
        <span>Contemporary</span>
    </a>


</div>