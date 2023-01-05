<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        img {
            display: block;
            margin: 20px auto;
            max-width: 90%;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <title>Ecommerce</title>
</head>
<body style="background: rgb(11, 1, 68)">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/dashboard">Ecommerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/productos">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/categorias">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/carrito">Carrito</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('signout')}}">cerrar sesion</a>
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">{{Auth::user()->name}}</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href=""><img style="width: 50px" src="images/butters.jpg" class="rounded float-end" alt="..."></a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        @yield('container')
      </div>
</body>
</html>
