<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>

    <title>@yield('title') |Administration</title>
    <style>

        @loyer reset{
            button{all:unset}
        }
         .htmx-indicator{
            display: none;
        }
        .htmx-request .htmx-indicator{
            display: inline-block;
        }
        .htmx-request.htmx-indicator{
            display: inline-block;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Agence</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @php
              $route= request()->route()->getName();
          @endphp
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="{{route('admin.property.index')}}" @class(['nav-link','active'=>str_contains($route,'property.')]) >Gerer les biens</a>
              </li>
              <li class="nav-item">
                <a  href="{{route('admin.option.index')}}" @class(['nav-link','active'=>str_contains($route,'option.')])>gèrer les options</a>
              </li>
            </ul>
            <div class="ms-auto">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se deconnecter</button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
          </div>
        </div>
      </nav>
    <div class="container mt-5">
        @include('shared.flash')
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
<script>
    new TomSelect('select[multiple]',{plugins: {remove_button: {title: 'Supprimer'}}})
</script>
</body>
</html>
