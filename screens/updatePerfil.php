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
    .title {
      font-size: var(--lg);
      margin-bottom: 36px;
      text-align: start;
    }
    .form {
      display: flex;
      flex-direction: column;
    }
    .form div {
      display: flex;
      flex-direction: column;
    }
    .label {
      font-size: var(--sm);
      font-weight: bold;
      margin-bottom: 4px;
    }
    .value {
      color: var(--very-light-pink);
      font-size: var(--md);
      margin: 8px 0 32px 0;
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
      .form-container {
        height: 100%;
      }
      .form {
        height: 100%;
        justify-content: space-between;
      }
    }
  </style>
</head>
<body>

<?php 
include("logueado.php");
include("prueba.php");
   $URL	= 'http://localhost:5000/logueado';
   $rs 	= API::GET($URL);
   $array  = API::JSON_TO_ARRAY($rs);
  $name = "";
  $email = "";
  $password = "";
  $id = 1;

     foreach ($array as $users) {
       $name = $users['name'];
       $email = $users['email'];
       $password = $users['password'];
       $id = $users['id'];
     }
 

     if(isset($_POST['enviar'])){
      LOGUEADO::LOGIN(false);
      $URLa	= 'http://localhost:5000/logueado/'. $id;
      $rs = API::DELETE($URLa);
      header('Location: /intelieco/screens/index.php');
     }
?>
  <div class="login">
    <div class="form-container">
      <h1 class="title">Mi Perfil</h1>

      <form action="/intelieco/screens/updatePerfil.php" class="form" method="POST">
        <div>
          <label for="name" class="label">Nombre</label>
          <p class="value"> <?php  print_r($name)   ?>  </p>

          <label for="email" class="label">Correo</label>
          <p class="value"><?php  print_r($email)   ?></p>

          <label for="password" class="label">Contraseña</label>
          <p class="value" value="hola"  ><?php  print_r($password) ?></p>
        </div>
        <input type="submit" value="Cerrar sesion" name="enviar" class="secondary-button login-button">
      </form>
    </div>
  </div>
</body>
</html>