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
    .my-order {
      width: 100%;
      height: 100vh;
      display: grid;
      place-items: center;
    }
    .title {
      font-size: var(--lg);
      margin-bottom: 40px;
    }
    .my-order-container {
      display: grid;
      grid-template-rows: auto 1fr auto;
      width: 300px;
    }
    .my-order-content {
      display: flex;
      flex-direction: column;
    }
    .order {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 16px;
      align-items: center;
      margin-bottom: 12px;
    }
    .order p:nth-child(1) {
      display: flex;
      flex-direction: column;
    }
    .order p span:nth-child(1) {
      font-size: var(--md);
      font-weight: bold;
    }
    .order p span:nth-child(2) {
      font-size: var(--sm);
      color: var(--very-light-pink);
    }
    .order p:nth-child(2) {
      text-align: end;
      font-weight: bold;
    }
  </style>
</head>

<?php
include("prueba.php");
$URL	= 'http://localhost:5000/order';
$rs 	= API::GET($URL);
$array  = API::JSON_TO_ARRAY($rs);
?>
<body>
  <div class="my-order">
    <div class="my-order-container">
      <h1 class="title">Mis ordenes</h1>

      <?php
      foreach ($array as $product) {
      ?>

      <div class="my-order-content">
        <div class="order">
          <p>
            <span>fecha : <?php print_r($product['fecha'])?></span>
            <span>cantidad :  <?php print_r($product['cantidad'])?></span>
          </p>
          <p>total : <?php print_r($product['total'])?></p>
          <p><?php print_r($product['estado'])?></p>
          <img src="../icons/flechita.svg" alt="arrow">
        </div>
      </div>
      <?php 
         }
      ?>
    </div>
  </div>
</body>
</html>