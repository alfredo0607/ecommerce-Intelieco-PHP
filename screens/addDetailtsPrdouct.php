

<?php
include("prueba.php");
if(isset($_GET['id'])){
  $idProduct=$_GET['id'];
  $URL	= 'http://localhost:5000/productos/';
  $URLCARD	= 'http://localhost:5000/productDeilts';
  $rs 	= API::GET($URL . $idProduct);
  $array  = API::JSON_TO_ARRAY($rs);
    $rs = API::POST($URLCARD, $array);
}



if(isset($_GET['delete'])){
  $idProduct=$_GET['delete'];
  $URLCARD	= 'http://localhost:5000/productDeilts/';
  $rs 	= API::DELETE($URLCARD . $idProduct);
}

?>


<?php
Header("Location: index.php");  


?>

    
