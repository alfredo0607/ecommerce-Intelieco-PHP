<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    nav {
      display: flex;
      justify-content: space-between;
      background : green;
      padding: 0 24px;
      border-bottom: 1px solid var(--very-light-pink);
    }
    .menu {
      display: none;
    }
    .logo {
      width: 100px;
    }
    .navbar-left ul,
    .navbar-right ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
      height: 60px;
    }
    .navbar-left {
      display: flex;
    }
    .navbar-left ul {
      margin-left: 12px;
    }
    .navbar-left ul li a,
    .navbar-right ul li a {
      text-decoration: none;
      color: var(--very-light-pink);
      padding: 8px;
      border-radius: 8px;
    }
    .navbar-left ul li a:hover,
    .navbar-right ul li a:hover {
      border: 1px solid var(--hospital-green);
      color: var(--hospital-green);
    }
    .navbar-email {
      color: var(--very-light-pink);
      font-size: var(--sm);
      margin-right: 12px;
    }
    .navbar-shopping-cart {
      position: relative;
    }
    h4 {
      color: white;
    }

    .navbar-shopping-cart div {
      width: 16px;
      height: 16px;
      background-color: var(--hospital-green);
      border-radius: 50%;
      font-size: var(--sm);
      font-weight: bold;
      position: absolute;
      top: -6px;
      right: -3px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    @media (max-width: 640px) {
      .menu {
        display: block;
      }
      .navbar-left ul {
        display: none;
      }
      .navbar-email {
        display: none;
      }
    }
  </style>
</head>

<body>

<div>
  
  
  <?php 

include("logueado.php");

$logueado = false;


  $URL	= 'http://localhost:5000/logueado';
  $rs 	= LOGUEADO::GET($URL);
  $array  = LOGUEADO::JSON_TO_ARRAY($rs);
  $name = "";
    foreach ($array as $users) {
      $name = $users['name'];
    }

    if( count($array)  != 0 ){
      $logueado = LOGUEADO::LOGIN(true);
    }else{
      $logueado = LOGUEADO::LOGIN(false);
    }


$URLCARD	= 'http://localhost:5000/carrito';
$rsm 	= LOGUEADO::GET($URLCARD);
$arrayCard  = LOGUEADO::JSON_TO_ARRAY($rsm);




if($logueado == false) { ?>
<body>
  <nav>
    <img src="../icons/icon_menu.svg" alt="menu" class="menu">

    <div class="navbar-left">
      <h4 class="logo">Intelieco</h4>
      <!-- <img src="../logos/logo_yard_sale.svg" alt="logo" class="logo"> -->

      <ul>
        <li>
          <a href="./index.php">Inicio</a>
        </li>
        <li>
          <a href="./filterProduct.php">Productos</a>
        </li>
        <li>
          <a href="/">Empresas aliadas</a>
        </li>
        <li>
          <a href="/">Quienes somos</a>
        </li>
        <li>
          <a href="/">Contacto</a>
        </li>
        <li>
          <a href="/">Servicio al cliente</a>
        </li>
      </ul>
    </div>

    <div class="navbar-right">
      <ul>
        <li class="navbar-email">
          <a href="./login.php">Iniciar sesion</a></li>
        <li class="navbar-shopping-cart">
        <a href="./listCar.php">
        <img src="../icons/icon_shopping_cart.svg" alt="shopping cart" href="./listCar.php">
        </a>
          <div><?php echo count($arrayCard) ?></div>
        </li>
      </ul>
    </div>
  </nav>
</body> 



    <?php } ?>
    <?php if($logueado == true) { ?>
     <body>
  <nav>
    <img src="../icons/icon_menu.svg" alt="menu" class="menu">

    <div class="navbar-left">
      <img src="../logos/logo_yard_sale.svg" alt="logo" class="logo">

      <ul>
      <li>
          <a href="./index.php">Inicio</a>
        </li>
        <li>
          <a href="./filterProduct.php">Productos</a>
        </li>
        <li>
          <a href="/">Empresas aliadas</a>
        </li>
        <li>
          <a href="/">Quienes somos</a>
        </li>
        <li>
          <a href="/">Contacto</a>
        </li>
        <li>
          <a href="/">Servicio al cliente</a>
        </li>
      </ul>
    </div>

    <div class="navbar-right">
      <ul>
        <li class="navbar-email">
          <a href="./updatePerfil.php"><?php print_r($name)?></a></li>
        <li class="navbar-shopping-cart" >
        <a href="./listCar.php">
        <img src="../icons/icon_shopping_cart.svg" alt="shopping cart" href="./listCar.php">
        </a>
          <div><?php echo count($arrayCard) ?></div>
        </li>
      </ul>
    </div>
  </nav>
</body> 
    <?php }?>
</div>
</body>




</html>