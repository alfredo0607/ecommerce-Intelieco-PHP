<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Iniciar sesion</title>
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
    .login {
      width: 100%;
      height: 100vh;
      display: grid;
      place-items: center;
    }
    .form-container {
      display: grid;
      grid-template-rows: auto 1fr auto;
      width: 300px;
    }
    .logo {
      width: 150px;
      margin-bottom: 48px;
      justify-self: center;
      display: none;
    }
    .form {
      display: flex;
      flex-direction: column;
    }
    .form a {
      color: var(--hospital-green);
      font-size: var(--sm);
      text-align: center;
      text-decoration: none;
      margin-bottom: 52px;
    }
    .label {
      font-size: var(--sm);
      font-weight: bold;
      margin-bottom: 4px;
    }
    .input {
      background-color: var(--text-input-field);
      border: none;
      border-radius: 8px;
      height: 30px;
      font-size: var(--md);
      padding: 6px;
      margin-bottom: 12px;
    }
    .input-email {
      margin-bottom: 22px;
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
    .secondary-button {
      background-color: var(--white);
      border-radius: 8px;
      border: 1px solid var(--hospital-green);
      color: var(--hospital-green);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
    }
    .login-button {
      margin-top: 14px;
      margin-bottom: 30px;
    }
    @media (max-width: 640px) {
      .logo {
        display: block;
      }
    }
  </style>
</head>


<?php
include("prueba.php");

include("logueado.php");

$URL	= 'http://localhost:5000/users';
$URLOGUEADO	= 'http://localhost:5000/logueado';
$rs 	= API::GET($URL);
$array  = API::JSON_TO_ARRAY($rs);
$status = false;
$data = [];

if (isset($_POST['enviar'])) {


  
 foreach ($array as $product) {
  if($_POST['email'] == $product['email'] && $_POST['password'] == $product['password']){
    // echo '<pre>';
    // print_r($product);
    // echo '</pre>';
    // $data = $product

    $r 	= API::POST($URLOGUEADO, $product); 

    LOGUEADO::LOGIN(true);
   header('Location: /intelieco/screens/');

  }else{
    $status = true;
  }
 }
}

if($status == true){
  echo '<h1> Correo/Contraseña incorrectos </h1>';
}else

?>

<?php if(isset($_POST['enviar'])) {  ?>
   <script>
// localStorage.setItem('id', '<?php print_r($data['id']) ?>'); 
// document.location.href = "/intelieco/screens/"; 
</script> 

  <?php 
      // header('Location: /intelieco/screens/');
    } ?>


<body>
  <div class="login">
    <div class="form-container">
      <img src="./logos/logo_yard_sale.svg" alt="logo" class="logo">

      <form action="/intelieco/screens/login.php" class="form"  method="POST"  >

      <h1>Iniciar Sesion</h1>

        <label for="email" class="label">Correo</label>
        <input type="text" name="email" placeholder="ejemplo@ejemplo.cm" class="input input-email">

        <label for="password" class="label">Cotraseña</label>
        <input type="password" name="password" placeholder="*********" class="input input-password">

        <input type="submit" value="Log in" name="enviar" class="primary-button login-button">
        <a href="/">Recuperar contraseña</a>
      </form>

      <a href="./register.php">
      <button class="secondary-button signup-button" >Registrarse</button>
      </a>
    </div>
  </div>

  <?php







?>

</body>
</html>