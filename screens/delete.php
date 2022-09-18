<?php
include("prueba.php");
if(isset($_GET['id'])){

  $idProduct=$_GET['id'];

  $URLCARD	= 'http://localhost:5000/carrito/';
  $rs = API::DELETE($URLCARD . $idProduct);

}

?>

<?php
Header("Location: listCar.php");  
?>

    
