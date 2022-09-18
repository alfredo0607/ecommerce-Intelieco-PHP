

<?php
include("prueba.php");
if(isset($_GET['id'])){
  $idProduct=$_GET['id'];
  $URL	= 'http://localhost:5000/productos/';
  $URLCARD	= 'http://localhost:5000/carrito';
  $rs 	= API::GET($URL . $idProduct);
  $array  = API::JSON_TO_ARRAY($rs);
    $rs = API::POST($URLCARD, $array);
}

?>

<script> 
    alert("Producto agregado con exito");
</script>

<?php
Header("Location: index.php");  
?>

    
