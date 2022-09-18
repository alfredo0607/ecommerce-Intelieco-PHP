<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Document</title>
  <style>
    :root {
      --white: #FFFFFF;
      --black: #000000;
      --very-light-pink: #C7C7C7;
      --text-input-field: #F7F7F7;
      --hospital-green: #ACD9B2;
      --sm: 14px;
      --md: 16px;
      --lg: 18px;
    }
    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
    }
    .product-detail {
      background: var(--very-light-pink);
      width: 360px;
      padding-bottom: 100px;
      position: absolute;
      right: 0;
    }
    .product-detail-close {
      background: var(--white);
      width: 15px;
      height: 15px;
      position: absolute;
      top: 24px;
      left: 10px;
      z-index: 2;
      padding: 12px;
      border-radius: 50%;
    }
    .product-detail-close:hover {
      cursor: pointer;
    }
    .product-detail > img:nth-child(2) {
      width: 100%;
      height: 360px;
      object-fit: cover;
      border-radius: 0 0 20px 20px;
    }
    .product-info {
      margin: 24px 24px 0 24px;
      display: flex;

    }
     p:nth-child(1) {
      width: 100%;
      font-weight: bold;
      font-size: var(--md);
      margin-top: 0;
      margin-bottom: 4px;
    }
    .img-detail {
      width: 30px;
      height: 30px;
      margin: 0.5rem
    }
     
    .primary-button {
      background-color: green;
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
    }
    .add-to-cart-button {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    p. {
      display: inline-block;
    }

    @media (max-width: 640px) {
      .product-detail {
        width: 100%;
      }
    }
  </style>
</head>
<body>



<?php
include("apithe.php");
$URL	= 'http://localhost:5000/productDeilts';
$rs 	= APITHE::GET($URL);
$array  = APITHE::JSON_TO_ARRAY($rs);

if(count($array) > 1){
  foreach ($array as $product) {
    $idProduct=$product['id'];
    $URLCARD	= 'http://localhost:5000/productDeilts/';
    $rs = APITHE::DELETE($URLCARD . $idProduct);
  }
}

// foreach ($array as $product) {
//   echo '<pre>';
//   print_r($product);
// }

?>


<?php
      foreach ($array as $product) {
      ?>

  <aside class="product-detail">
    <div class="product-detail-close">
      <a href="addDetailtsPrdouct.php?delete=<?php echo $product['id'] ?>">
      <img src="../icons/icon_close.png" alt="close">
      </a>
    </div>
    <img src="<?php print_r($product['image'])?>" alt="bike">

      <p>Precio : <?php print_r($product['price'])?></p>
      <p>Nombre : <?php print_r($product['name'])?></p>
      <p>Categoria : <?php print_r($product['categoria'])?></p>
  

      <a href="addcarrito.php?id=<?php echo $product['id'] ?>"  >
    <button class="primary-button add-to-cart-button">
        <img  class="img-detail" src="../icons/bt_add_to_cart.svg" alt="add to cart">
        Add to cart
      </button>

      </a>

  </aside>


  <?php 
         }
      ?>

</body>
</html>