<?php
// Include the database configuration file
require_once 'connector.php';

// Get image data from database
//$result = $con->query("SELECT photo_image FROM photo ORDER BY photo_id DESC");
$result = $con->query("SELECT photo_image FROM photos photo_id=37");
?>

<?php if($result->num_rows==1){
       while($row = $result->fetch_assoc()){
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo_image']); ?>" /><br>
         }
 }else{
  echo "error occured while loading Image form database:Artem.db";
 }
