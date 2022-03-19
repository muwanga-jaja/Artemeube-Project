<?php
//echo "Classical products";

?>


<style>
.sidenav {
    height: auto;
    width: 0;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 10px;
    }

    .sidenav a {
        font-size: 18px;
    }
}

.classical-products {
    margin-top: 12%;
    margin-left: 20px;
}
</style>


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<div class="classical-products">
    <div class="side-concept-select">
        <h2>Admin Panel</h2>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="" onclick="closeNav()">&times;</a>
            <a href="index.php?page=adminPanel.php&task=adminProducts.php">Items</a>
            <a href="#">Users</a>
            <a href="#">Contacts</a>
            <a href="index.php?page=adminPanel.php&task=layouts.php">Layouts</a>
        </div>
    </div>
    <div class="main-area">
        <?php
           if(isset($_GET['task'])){
                switch ($_GET['task']) {
                    case 'adminProducts.php':
                        include "adminProducts.php";
                        break;
                    case 'registerProduct.php':
                        include "registerProduct.php";
                        break;
                    case 'deleteProduct.php':
                        include "deleteProduct.php";
                        break;
                    case 'updateProduct.php':
                        include "updateProduct.php";
                        break;
                    case 'layouts.php':
                        include "layouts.php";
                        break;
                    case 'addProductPhoto.php':
                        include "addProductPhoto.php";
                        break;
                    case 'addDesignPhoto.php':
                        include "addDesignPhoto.php";
                        break;

                    default:
                        # code...
                        break;
                }

           }
        ?>
    </div>
</div>
