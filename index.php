<html>

<head>

    <link rel="stylesheet" type="text/css" href="galleryStyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="socialMedia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
        ARTEMEUBLE FUNITURE
    </title>
</head>
<?php
    
?>

<body>
    <div id="main" name="main_div">
        <div class="footer-social-links">
            <a href="https://facebook.com/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://youtube.com/" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
            <a href="https://whatsapp.com/" title="Whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
            <a href="https://instagram.com/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="index.php?page=login.php" title="Login" target="blank"><i class="fa fa-sign-in">Login</i></a>
        </div>

        <header>
            <div id="header" class="header">
                <a href="index.php">
                    <div class="logo" name="logo">
                        <img src="images/no_bg_logo.png" alt=""><br />
                        <h4> ARTEMEUBLE </h4>
                    </div>

                </a>
                <div id="menu">
                    <nav class="navMenu">
                        <a href="index.php?page=home.php">Home</a>
                        <a href="index.php?page=aboutUs.php">About Us</a>
                        <a href="index.php?page=contactUs.php">Contact US</a>
                        <a href="index.php?page=artPiece.php">Items</a>
                        <a href="index.php?page=mark.php">Trying mark</a>
                        <div class="dot"></div>
                        <div class="box-search">
                            <form name="search" class="search-form">
                                <input type="text" placeholder="search" class="input-seach" name="txt"
                                    onmouseout="document.search.txt.value = ''">
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section>

            <article>

                <?php
                  if(isset($_GET['page'])){
                        switch($_GET['page']){
                            case 'home.php':
                                include "home.php";
                                break;
                                case 'customeCategory.php':
                                    include "customeCategory.php";
                                    break;
                                case 'customeCategory.php?msg':
                                    include "home.php";
                                    break;
                                case 'processor/layoutView.php':
                                    include "processor/layoutView.php";
                                    break;
                                case 'artPiece.php':
                                    include "artPiece.php";
                                    break;
                                case 'relatedItems.php':
                                    include "relatedItems.php";
                                    break;
                                case 'uploadLayout.php':
                                    include "uploadLayout.php";
                                    break;
                                case 'registerProduct.php':
                                    include "registerProduct.php";
                                    break;
                                case 'classicalProducts.php':
                                    include "classicalProducts.php";
                                    break;
                                case 'modernProducts.php':
                                    include "modernProducts.php";
                                    break;
                                case 'contemporaryProducts.php':
                                    include "contemporaryProducts.php";
                                    //may return artPiece.php
                                    break;
                                case 'registerUser.php':
                                    include "registerUser.php";
                                    break;
                                case 'login.php':
                                    include "login.php";
                                    break;
                                case 'contactUs.php':
                                    include "contactUS.php";
                                    break;
                                case 'aboutUs.php':
                                    include "aboutUs.php";
                                    break;
                                case 'onePieceOfArt.php':
                                    include "onePieceOfArt.php";
                                    break;
                                case 'singlePiece.php':
                                    include "singlePiece.php";
                                    break;    
                                case 'checkOut.php':
                                    include "checkOut.php";
                                    break;
                                case 'productShipping.php':
                                    include "productShipping.php";
                                    break;
                                case 'markDimension.php':
                                    include "markDimension.php";
                                    break;
                                case 'adminPanel.php':
                                    include "adminPanel.php";
                                    break;
                                case 'productSelection.php':
                                    include "productSelection.php";
                                    break;
                                case 'counterCheckout.php':
                                    include "counterCheckout.php";
                                case 'mark.php':
                                    include "mark.php";
                                case 'classicalPdt.php':
                                    include "classicalPdt.php";
                                case 'classicalCarpets.php':
                                    include "classicalCarpets.php";
                                default:
                                  //  include "adminPanel.php";
                                        break;
                        
                        }
                    }else if(isset($_GET['login'])){
                        switch ($_GET['login']) {
                            case 'admin':
                                # code...
                                include "adminPanel.php";
                                break;
                            
                            default:
                                # code...
                                    include "";
                                break;
                        }

                    }else{
                        include "landingPage.php";
                    }
                ?>
                <?php
    //authenticating the system user
    //saving the data to database and retireval
    //the returned message
        if(isset($_GET["msg"])){
             echo $_GET["msg"];
        }
    ?>
            </article>
        </section>
        <footer>
            <?php
            //footer code from footer.php
            include "footer.php";
             ?>
        </footer>
</body>

</html>