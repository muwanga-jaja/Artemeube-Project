
<style>
@import url("galleryStyle.css");
</style>
<script>

}
</script>
<div class="singlePiece-container">
    <h2><span>One Piece of ART</span></h2>
    <p>It is only and Only one piece of a kind in the whole world. No one will ever have it apart from you</p>

    <img id="myImg" src="images/downloaded/one_piece_of_art_sofa.jpg" alt="One Piece of art"
        style="width:100%;max-width:400px">

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
<br>
    <button class="block-button" onClick="gotoPage()">BUY IT</button>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
        
    function gotoPage() {
        location.replace("index.php?page=checkOut.php");
    }
    </script>