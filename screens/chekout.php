<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Intelieco | chekout</title>
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
      width: 360px;
      padding: 24px;
      box-sizing: border-box;
      position: absolute;
      right: 0;
    }
    .title-container {
      display: flex;
    }
    .title-container img {
      transform: rotate(180deg);
      margin-right: 14px;
    }
    .title {
      font-size: var(--lg);
      font-weight: bold;
    }
    .order {
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 16px;
      align-items: center;
      background-color: var(--text-input-field);
      margin-bottom: 24px;
      border-radius: 8px;
      padding: 0 24px;
    }
    .order p:nth-child(1) {
      display: flex;
      flex-direction: column;
    }
    .order p span:nth-child(1) {
      font-size: var(--md);
      font-weight: bold;
    }
    .order p:nth-child(2) {
      text-align: end;
      font-weight: bold;
    }
    .shopping-cart {
      display: grid;
      grid-template-columns: auto 1fr auto auto;
      gap: 16px;
      margin-bottom: 24px;
      align-items: center;
    }
    .shopping-cart figure {
      margin: 0;
    }
    .shopping-cart figure img {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      object-fit: cover;
    }
    .shopping-cart p:nth-child(2) {
      color: var(--very-light-pink);
    }
    .shopping-cart p:nth-child(3) {
      font-size: var(--md);
      font-weight: bold;
    }
    .primary-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
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
include("api2.php");

$sum = 0;
$URL = 'http://localhost:5000/carrito';
$rs  = API2::GET($URL);
$array  = API2::JSON_TO_ARRAY($rs);

?>

  <aside class="product-detail">
    <div class="title-container"> 
      <img src="../icons/flechita.svg" alt="arrow">
      <p class="title">Mi pedido</p>
    </div>

    <?php
      foreach ($array as $product) {
      ?>

    <div class="my-order-content">
      <div class="shopping-cart">
        <figure>
          <img src="<?php echo $product['image'] ?>" alt="bike">
        </figure>
        <p><?php print_r($product['name'])?></p>
        <p><?php print_r($product['price'])?></p>
      </div>

      <?php $sum += $product['price'] ?>


      <?php 
         }
      ?>

      <h2>Total : <?php print_r($sum)?> </h2>

      <a href="addMyOrder.php"  >
      <button class="primary-button">
        Checkout
      </button>

      </a>

    </div>
  </div>
  </aside>
</body>
</html>