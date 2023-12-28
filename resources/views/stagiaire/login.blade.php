<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* des règles media queries pour les petits écrans by yoro */
    @media screen and (max-width: 768px) {
      body {
        flex-direction: column-reverse;
      }

      .right-side {
        order: -1;
      }
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
    }
    .left-side {
      flex: 1;
      background: url('img/yoro.jpg') center/cover fixed;
      position: relative;
      overflow: hidden;
      font-weight: bold;
      font-family: 'Times New Roman', Times, serif;
      font-size: 22px;
      display: flex;
      justify-content: center;
      align-items: center;
      filter: blur(0px);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 69, 0, 0.67);
    }

    .content {
      text-align: center;
      color: white;
      z-index: 1;
    }

    .right-side {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #f4f4f4;
    }

    .logo {
      max-width: 100px;
      margin-bottom: 20px;
    }

    .login-form {
      width: 300px;
      padding: 20px;
      background-color: white;
      color: #FF4500;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-top-right-radius: 15px;
      box-sizing: border-box;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #FF4500;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }


    .titre-banner-connexion {
      font-family: "Montserrat", sans-serif;
      font-style: normal;
      font-weight: 700;
      font-size: 88px;
      line-height: 99.5%;
      color: #fff;
    }

    .titre-banner-connexion2 {
      font-family: "Montserrat", sans-serif;
      font-style: normal;
      font-weight: 700;
      font-size: 48px;
      line-height: 99.5%;
      color: #FF4500;
    }
  </style>
</head>

<body>

  <!-- Left side with by yoro-->
  <div class="left-side">
    <div class="overlay"></div>
    <div class="content">
      <h1 class="titre-banner-connexion ">Defarsci</h1>
      <p class="">Transformez vos idées en réalité</p>
    </div>
  </div>

  <!-- Right side by yoro -->


  <div class="right-side">
    <img class="logo" src="{{ asset('img/logo-defarsci.png') }}" alt="" srcset="" class=" h-22 w-20">
    @if (Session::has('error'))
    <div role="alert">
      <strong>Erreur!</strong>
      <span>{{ Session::get('error') }}</span>
    </div>
    @endif
    <div>
      <h2 class="titre-banner-connexion2 p-3">Connectez-vous</h2>
      <h4 class="text-center p-3" style="color: grey;">le mot de passe c'est <strong style="color:#FF4500 ;">passer123</strong></h4>
    </div>
    <div class="login-form">
      <form action="{{ route('stagiaires.login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email">
          @error('email')
          <p>{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="password">Mot de passe:</label>
          <input type="password" id="password" name="password">
          @error('password')
          <p>{{ $message }}</p>
          @enderror
        </div>
        <div>
          <button type="submit">Connexion</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>