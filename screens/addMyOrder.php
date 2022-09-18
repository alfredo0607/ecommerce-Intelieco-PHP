<?php
include("apithe.php");

    $data = [];
    $cantidad = 0;
    $total = 0;
  $URLCARD	= 'http://localhost:5000/carrito';
  $URL	= 'http://localhost:5000/order';
  $rs = APITHE::GET($URLCARD);
  $array  = APITHE::JSON_TO_ARRAY($rs);

  $cantidad = count($array);

  if(count($array) >= 1){

    foreach ($array as $product) {
        $total += $product['price'];
    }

    $place = ['fecha ' => date("m.d.y"), 'id' => random_int(1, 10000), 'estado' => 'sin entregar', 'statusBuy' => 'pagado', 'cantidad' => $cantidad, 'total' => $total];
    $rs = APITHE::POST($URL, $place);
  }

?>

<?php
 Header("Location: success.php");  
?>

    
