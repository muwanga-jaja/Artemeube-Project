<style>
div.center {
    margin-top: 90px;
    margin-left: 14%;
    border-top: 20px;
}

.spacer-left {
    width: 70%;
    margin-left: 55px;
}

.center {
    display: grid;
    grid-template-columns: repeat(5, 2fr);
    grid-template-rows: repeat(5, 13vw);
    grid-gap: 8px;
}

div.gallery {
    margin: 5px 10px;
    border: 1px solid #ccc;
    float: left;
    width: 150px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: 120px;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>
<div class="lefter-button">
    <a href="index.php?page=uploadLayout.php">
        <button class=" button "> Upload Layout</button>
    </a>
    <?php
        $message = "";
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
         //   echo $message;
        }
    ?>
</div>


<div class="center">
    <?php
                include "processor/connector.php";
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
   // echo "sql: successful";
}else{
    echo "bad sql";
}

       // for($index=0; $index < $rows; $index++){
            while($row=mysqli_fetch_array($result)){
                echo "<div class='gallery'>";
                echo "<a target='_blank' href='index.php?page=singlePiece.php'>";
                echo "<img src='data:image/jpg;charset=utf8;base64,". base64_encode($row['photo_image'])."' width=150 height=150>";
                echo "</a>";
                echo "<div class='desc'>".$row['product_name']."</div>";
                echo "</div>";
            }    
       // }

      ?>
</div>

<div class="center">
    <div class="gallery">
        <a target="_blank" href="images/arm_chair.png">
            <img src="images/arm_chair.png">
        </a>
        <div class="desc">Arm chair</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/carpet.png">
            <img src="images/carpet.png">
        </a>
        <div class="desc">carpet</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/console.png">
            <img src="images/console.png">
        </a>
        <div class="desc">console</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/dressng_table.png">
            <img src="images/dressing_table.png">
        </a>
        <div class="desc">dressng_table</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/bed.png">
            <img src="images/bed.png">
        </a>
        <div class="desc">bed</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/benches.png">
            <img src="images/benches.png">
        </a>
        <div class="desc">benches</div>
    </div>

    <div class="gallery">
        <a target="_blank" href="images/arm_chair.png">
            <img src="images/arm_chair.png">
        </a>
        <div class="desc">Arm chair</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/carpet.png">
            <img src="images/carpet.png">
        </a>
        <div class="desc">carpet</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/console.png">
            <img src="images/console.png">
        </a>
        <div class="desc">console</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/dressng_table.png">
            <img src="images/dressing_table.png">
        </a>
        <div class="desc">dressng_table</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/bed.png">
            <img src="images/bed.png">
        </a>
        <div class="desc">bed</div>
    </div>
    <div class="gallery">
        <a target="_blank" href="images/benches.png">
            <img src="images/benches.png">
        </a>
        <div class="desc">benches</div>
    </div>
</div>
</div>