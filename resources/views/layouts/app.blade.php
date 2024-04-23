@extends('components.header.navbar')
@extends('components.header.topheader')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('link')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>@yield('title')</title>
</head>
<body style="background-color: #f0f6fb">

<!-- navbar -->
@include('components.header.navbar')
@include('components.header.topheader')
<nav class="navbar bg-body-tertiary" style="background-color: #ffffff; height: 8vh;">
      <a class="ml-auto" style="">
        <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" alt="Perfil" style="width:2vw; height: 4vh;">
        Olá, Selso soares!
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
      </svg>
  </nav>
<!-- end of navbar -->

  @yield('content')
</body>
</html>