<style>
.shopping-cart {
    width: 750px;
    height: 423px;
    margin: 80px auto;
    background: #FFFFFF;
    box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
    border-radius: 6px;

    display: flex;
    flex-direction: column;
}

.title {
    height: 60px;
    border-bottom: 1px solid #E1E8EE;
    padding: 20px 30px;
    color: #5E6977;
    font-size: 18px;
    font-weight: 400;
}

.item {
    padding: 20px 30px;
    height: 120px;
    display: flex;
}

.item:nth-child(3) {
    border-top: 1px solid #E1E8EE;
    border-bottom: 1px solid #E1E8EE;
}

.buttons {
    position: relative;
    padding-top: 30px;
    margin-right: 60px;
}

.delete-btn,
.like-btn {
    display: inline-block;
    Cursor: pointer;
}

.delete-btn {
    width: 18px;
    height: 17px;
    background: url(&amp;quot;delete-icn.svg&amp;quot;) no-repeat center;
}

.like-btn {
    position: absolute;
    top: 9px;
    left: 15px;
    background: url('twitter-heart.png');
    width: 60px;
    height: 60px;
    background-size: 2900%;
    background-repeat: no-repeat;
}

.is-active {
    animation-name: animate;
    animation-duration: .8s;
    animation-iteration-count: 1;
    animation-timing-function: steps(28);
    animation-fill-mode: forwards;
}

@keyframes animate {
    0% {
        background-position: left;
    }

    50% {
        background-position: right;
    }

    100% {
        background-position: right;
    }
}

.image {
    margin-right: 50px;
    height:70px;
}

.description {
    padding-top: 10px;
    margin-right: 60px;
    width: 115px;
}

.description span {
    display: block;
    font-size: 14px;
    color: #43484D;
    font-weight: 400;
}

.description span:first-child {
    margin-bottom: 5px;
}

.description span:last-child {
    font-weight: 300;
    margin-top: 8px;
    color: #86939E;
}

.quantity {
    padding-top: 20px;
    margin-right: 60px;
}

.quantity input {
    -webkit-appearance: none;
    border: none;
    text-align: center;
    width: 32px;
    font-size: 16px;
    color: #43484D;
    font-weight: 300;
}

button[class*=btn] {
    width: 30px;
    height: 30px;
    background-color: #E1E8EE;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.minus-btn img {
    margin-bottom: 3px;
}

.plus-btn img {
    margin-top: 2px;
}

button:focus,
input:focus {
    outline: 0;
}

.total-price {
    width: 83px;
    padding-top: 27px;
    text-align: right;
    font-size: 16px;
    color: #43484D;
    font-weight: 300;
}

.custom-select {
    position: relative;
    font-family: Arial;
}

.custom-select select {
    display: none;
    /*hide original SELECT element:*/
}

.select-selected {
    background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
    position: absolute;
    content: "";
    top: 14px;
    right: 10px;
    width: 0;
    height: 0;
    border: 6px solid transparent;
    border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
    border-color: transparent transparent #fff transparent;
    top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,
.select-selected {
    color: #ffffff;
    padding: 8px 16px;
    border: 1px solid transparent;
    border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
    cursor: pointer;
    user-select: none;
}

/*style items (options):*/
.select-items {
    color:black;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
    display: none;
}

.select-items div:hover,
.same-as-selected {
    background-color: rgba(0, 0, 0, 0.1);
}
</style>
<script src="jquery.js"> </script>
<script>
$('.like-btn').on('click', function() {
    $(this).toggleClass('is-active');
});

</script>

<div class="shopping-cart">
    <!-- Title -->
    <div class="title">
        Shopping cart
    </div>

    <!-- Product #1 -->
    <div class="item">
        <div class="buttons">
            <span class="">1</span>
            <span class="like-btn"></span>
        </div>

        <div class="image">
            <img src="images/carpet.png" alt="" />
        </div>

        <div class="description">
            <span>Carpet</span>
            <span>Abstract Color designs</span>
            <span>White/brown/black</span>
        </div>

        <div class="" style="color:black">
        <label for="length"style="color:black;">Quantiy</label>
            <select name="qty" class="custom-select" style="width:70px;">
                <?php   
            for ($index=1; $index<=100;$index++) {
                echo "<option value='.$index.'>".$index." </option>";
            }
            ?>
            </select>
        </div>
        <div class="" style="color:black">
            <label for="length"style="color:black;">Dimensions</label>
            <select name="length" class="custom-select" style="width:70px;">
                <?php   
            for ($index=2; $index<=50;$index++) {
                echo "<option value='.$index.'> 2 *".$index." meters</option>";
            }
            ?>
            </select>
        </div>
       
        <div class="total-price">2800 AED</div>
    </div>

 <!-- Product #2 -->
 <div class="item">
        <div class="buttons">
            <span class="">1</span>
            <span class="like-btn"></span>
        </div>

        <div class="image">
            <img src="images/curtains.png" alt="" />
        </div>

        <div class="description">
            <span>Carpet</span>
            <span>Abstract Color designs</span>
            <span>White/brown/black</span>
        </div>

        <div class="" style="color:black">
        <label for="length"style="color:black;">Quantiy</label>
            <select name="qty" class="custom-select" style="width:70px;">
                <?php   
            for ($index=1; $index<=100;$index++) {
                echo "<option value='.$index.'>".$index." </option>";
            }
            ?>
            </select>
        </div>
        <div class="" style="color:black">
            <label for="length"style="color:black;">Dimensions</label>
            <select name="length" class="custom-select" style="width:70px;">
                <?php   
            for ($index=2; $index<=50;$index++) {
                echo "<option value='.$index.'>2 *".$index." m</option>";
            }
            ?>
            </select>
        </div>
       
        <div class="total-price">2300 AED</div>
    </div>

    <div class="total-price" style="margin-bottom:0px; margin-top:10px;margin-left:85%;font-weight:500">
            <button type="button">Check out: 5100 AED</button>
</div>
    
</div>
</div>