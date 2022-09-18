<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Intelieco | Carrito</title>
  <style>
    .Checkout {
      width: 100%;
      height: 100vh;
      display: grid;
      place-items: center;
    }

    .title {
      font-size: var(--lg);
      margin-bottom: 40px;
    }

    .Checkout-container {
      display: grid;
      grid-template-rows: auto 1fr auto;
      width: 600px;
    }

    .my-order-content {
      display: flex;
      flex-direction: column;
    }

    .my-order {
      width: 73%;
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

    .order p span:nth-child(2) {
      font-size: var(--sm);
      color: var(--very-light-pink);
    }

    .order p:nth-child(2) {
      text-align: end;
      font-weight: bold;
      color: green;
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

    .shopping-cart .delete:nth-child(3) {
      font-size: var(--md);
      font-weight: bold;
      color: red;
    }

    .link {
      color: green;
    }
  </style>
</head>

<body>


  <?php
  include("header.php");
  include("chekout.php");
  include("prueba.php");

  $URL = 'http://localhost:5000/carrito';
  $rs  = API::GET($URL);
  $array  = API::JSON_TO_ARRAY($rs);
  //  $data = "Hola mundo";
  // echo $data;
  ?>
  <div class="my-order">
    <div class="my-order-container">
      <h1 class="title">Mi pedido</h1>

      <div class="my-order-content">
        <div class="order">
          <p>
            <span> <?php echo date("m.d.y") ?></span>
            <span>Cantidad de productos : <?php echo count($array) ?></span>
          </p>
          <p> <a class="link" href="index.php">Volver a seguir comprando</a></p>
        </div>

        <?php
        foreach ($array as $product) {
        ?>

          <div class="shopping-cart">
            <figure>
              <img src="<?php echo $product['image'] ?>" alt="bike">
            </figure>
            <p><?php print_r($product['name']) ?></p>
            <a class="delete" href="delete.php?id=<?php echo $product['id'] ?>">Eliminar</a>
          </div>

        <?php
        }
        ?>

      </div>
    </div>
  </div>
</body>

</html>