<?php
echo '<center><h1>Product Details</h1></center><br>';


//produdt interface
interface ProductInterface{

}

//abstract product class

class AbstractProduct {

     public $product_name;
     public $product_description="descccc";
     public $product_Image="_photo";
     public $product_price="";
     public $product_category="";
     public $product_fushion="";

    //constructor

    public function __construct($product_name,$product_description,$product_Image,$product_price,$product_fushion){
            $this->$product_name=$product_name;
            $this->$product_description=$product_description;
            $this->$product_Image=$product_Image;
            $this->$product_price=$product_price;
            $this->$product_fushion=$product_fushion;
    }
//product name
     function getProductName(){
        return $this->$product_name;
    }
    public function setProductName($product_name){
        $this->$product_name=$product_name;
    }
//product price
    public function getProductPrice(){
        return $this->$product_price;
    }
    public function setProductprice($product_price){
        $this->$product_price=$product_price;
    }
//description
    public function getProductDescription(){
        return $this->product_description;
    }public function setProdudctDescription($product_description){
        $this->$product_description=$product_description;
    }
//category
    public function getProductCategory(){
        return $this->$product_category;
    }
    public function setProductCategory($product_category){
        $this->$product_category=$product_category;
    }
//fushion
    public function getProductFushion(){
        return $this->$product_fushion;
    }
    public function setProductFushion($product_fushion){
        $this->$product_fushion=$product_fushion;
    }

}
//different object classes

class carpets extends AbstractProduct{
   
    //constructor
    public function  __construct($product_name,$product_description,$product_Image,$product_price,$product_fushion){
           parent:: __construct($product_name,$product_description,$product_Image,$product_price,$product_fushion);
            echo "product created..<br>";
            echo $this->product_name;
    }

    public function getDetails(){
        echo "All product information...<br>";
        //echo $this->$product_name;
    }

}

$gucci= new AbstractProduct('Gucci carpets','expensive Modern gucci Carpets','Gucci Image',9900,"Modern");
//echo $gucci->getDetails();
$gucci->setProductName("Gucci Carpet");
$gucci->setProdudctDescription("Brand new brands from Gucci designs");
$gucci->setProductPrice("8900");
$gucci->setProductCategory("Custome made Product");
$gucci->setProductFushion("Modern");
echo $gucci->getProductName();
?>