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
      justify-items: center;
    }
    .logo {
      width: 150px;
      margin-bottom: 48px;
      justify-self: center;
      display: none;
    }
    .title {
      font-size: 24px;
      margin-bottom: 50px;
      text-align: center;
    }
    .subtitle {
      color: var(--very-light-pink);
      font-size: var(--md);
      font-weight: 300;
      margin-top: 0;
      margin-bottom: 32px;
      text-align: center;
    }
    .email-image {
      width: 132px;
      height: 132px;
      border-radius: 50%;
      background-color: var(--text-input-field);
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 24px;
    }
    .email-image img {
      width: 300px;
    }
    .resend {
      font-size: var(--sm);
    }
    .resend span {
      color: var(--very-light-pink);
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
      margin-top: 100px;
      margin-bottom: 30px;
    }
    @media (max-width: 640px) {
      .logo {
        display: block;
      }
    }
  </style>
</head>
<body>
  <div class="login">
    <div class="form-container">
      <img src="./logos/logo_yard_sale.svg" alt="logo" class="logo">

      <h1 class="title">Pago realizado con exito!</h1>
      <p class="subtitle"></p>

      <div class="email-image">
      <img src="../icons/exito.png"  />
      </div>

      <a class="ss" href="./order.php"> 
      <button class="primary-button login-button" href="./order.php" >Ver mis pedidos </button>
      </a>

    </div>
  </div>
</body>
</html>