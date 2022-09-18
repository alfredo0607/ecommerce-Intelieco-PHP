<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <title>Nueva cuenta</title>
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
    .input-name,
    .input-email,
    .input-password {
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
include("prueba.php");
$URL	= 'http://localhost:5000/users';
$data =[];
$msg = "";

if(isset($_POST['enviar'])){
  $data['id'] = random_int(1, 10000);
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['password'] = $_POST['password'];
  $r 	= API::POST($URL, $data); 

  $msg = "Usuario Registrado Con Exito";
}

?>

  <div class="login">
    <div class="form-container">
      <h1 class="title">Crear nueva cuenta</h1>

      <form action="/intelieco/screens/register.php" class="form"  method="POST">

      <?php $msg ?>
        <div>
          <label for="name" class="label">Nombre</label>
          <input type="text" name="name" placeholder="Alfredo" class="input input-name">

          <label for="email" class="label">Correo</label>
          <input type="text" name="email" placeholder="ejemplo@ejemplo.com" class="input input-email">

          <label for="password" class="label">Contraseña</label>
          <input type="password" name="password" placeholder="*********" class="input input-password">
        </div>

        <input type="submit" value="Create" name="enviar" class="primary-button login-button">


        <a href="./login.php" >Iniciar sesion</a>

      </form>
    </div>
  </div>
</body>
</html>