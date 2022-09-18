<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <title>Intelieco | Inicio</title>
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

    .title {
      margin: 1rem;
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, 240px);
      gap: 26px;
      place-content: center;
    }

    .product-card {
      width: 240px;
    }

    .product-card img {
      width: 240px;
      height: 240px;
      border-radius: 20px;
      object-fit: cover;
    }

    .product-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 12px;
    }

    .product-info figure {
      margin: 0;
    }

    .product-info figure img {
      width: 35px;
      height: 35px;
    }

    .product-info div p:nth-child(1) {
      font-weight: bold;
      font-size: var(--md);
      margin-top: 0;
      margin-bottom: 4px;
    }

    .product-info div p:nth-child(2) {
      font-size: var(--sm);
      margin-top: 0;
      margin-bottom: 0;
      color: var(--very-light-pink);
    }

    @media (max-width: 640px) {
      .cards-container {
        grid-template-columns: repeat(auto-fill, 140px);
      }

      .product-card {
        width: 140px;
      }

      .product-card img {
        width: 140px;
        height: 140px;
      }
    }
  </style>

<body>
  <?php
  include("header.php");
  include("detailProduct.php");
  include("prueba.php");
  $URLOGUEADO  = 'http://localhost:5000/logueado';
  $URL  = 'http://localhost:5000/productos';
  $rs   = API::GET($URL);
  $array  = API::JSON_TO_ARRAY($rs);


  // foreach ($array as $product) {
  //   echo '<pre>';
  //   print_r($product);
  // }

  ?>

  <h1 class="title">Producto Destacados </h1>

  <section class="main-container">
    <div class="cards-container">
      <?php
      foreach ($array as $product) {
      ?>


        <div class="product-card">
          <a class="a" href="addDetailtsPrdouct.php?id=<?php echo $product['id'] ?>">
            <img src="<?php echo $product['image'] ?>" alt="">
          </a>
          <div class="product-info">
            <div>
              <p><?php print_r($product['price']) ?></p>
              <p></p>
              <p><?php print_r($product['name']) ?></p>
              <p><?php print_r($product['categoria']) ?></p>
            </div>
            <figure>
              <a href="addcarrito.php?id=<?php echo $product['id'] ?>">
                <img src="../icons/bt_add_to_cart.svg" alt="">
              </a>
            </figure>
          </div>

        </div>

      <?php
      }
      ?>

    </div>
  </section>

</body>

</html>