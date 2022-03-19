<?php
//echo "Classical products";
?>


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

.s {
    margin-top: 150px;
}

.s>h2 {
    padding: 0px;
}
</style>


<div class="s">
    <h2>Carpets  : Classical Fashion</h2>
</div>
<div class="center">
<div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
            </a>
            <div class="desc">carpet</div>
        </div>
        <div class="gallery">
            <a target="_blank" href="images/carpet.png">
                <img src="images/carpet.png">
        </a>
            <div class="desc">carpet</div>
        </div>

    <?php
                include "processor/connector.php";

                $sql="SELECT products.product_id, 
                             products.product_name,
                             products.product_style,
                             photo.photo_image
                        FROM products, photo
                        WHERE products.product_id=photo.photo_id
                        AND products.product_style='classical'";
                $result = $con->query($sql) or die(mysqli_error($con)); 
                $rows=mysqli_num_rows($result);
                if($result){
                   // echo "query done";
                }
        for($index=0; $index < $rows; $index++){
            while($row=mysqli_fetch_array($result)){
                echo "<div class='gallery'>";
                echo "<a target='_blank' href='index.php?page=singlePiece.php&id=".$row['product_id']."'>";
                echo "<img src='data:image/jpg;charset=utf8;base64,". base64_encode($row['photo_image'])."' width=150 height=150>";
                echo "</a>";
                echo "<div class='desc'>".$row['product_name']."</div>";
                echo "</div>";
            }    
        }

      ?>
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
    </div><div class="gallery">
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
</div>