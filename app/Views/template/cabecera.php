<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="Estilos/Style.css">
  <style>
    body {
      background: rgb(249, 255, 185);
      background: linear-gradient(90deg, rgba(249, 255, 185, 1) 0%, rgba(234, 242, 175, 0.8764625702341511) 100%);
    }

    nav,
    #footer {
      background: rgb(0, 45, 210);
      background: linear-gradient(90deg, rgba(0, 45, 210, 1) 0%, rgba(93, 182, 251, 1) 100%);
    }

    #navbarDropdown {
      color: #fff;
    }

    .carousel-inner div img {
      max-height: 70vh;
      object-fit: cover;
      filter: blur(70%);

    }

    #carousel {
      position: relative;
    }

    #carousel .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .card img {
      height: 390px;
      object-fit: cover;
    }

    .row div figure {
      margin-top: 20px;
      margin-bottom: 14px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .row .card figure img {
      width: 90%;
      height: 100%;
      object-fit: cover;
      border: 1px;
      border-radius: 100%;
    }

    #footer {
      width: 100%;
    }

    #footer a {
      color: #fff;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-light">

    <div class="container">

      <a class="navbar-brand fs-3 text" href="<?= base_url('/inicio') ?>"><strong>Tu cocina</strong> </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ms-4">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('/comidaMar'); ?>">Comida de mar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('/sopas'); ?>">Sopas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('/ensalada'); ?>">Ensaladas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('/carnes'); ?>">Carnes</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fst-italic fw-bolder" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <em>Bienvenid@</em> <strong><?= session('nombre') ?></strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url("cuenta/" . (int)session('id')) ?>">Cuenta <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg></a></li>

              <?php if (session('type') == 'superAdministrador' | session('type') == 'administrador') : ?>
                <li><a class="dropdown-item" href="<?= base_url('/listarU'); ?>">Usuarios <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                  </a></li>
              <?php endif ?>

              <?php if (session('type') == 'superAdministrador') : ?>
                <li><a class="dropdown-item" href="<?= base_url('/listarA'); ?>">Administradores <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                  </a></li>
              <?php endif ?>

              <?php if (session('type') == 'superAdministrador' || session('type') == 'administrador') : ?>
                <li><a class="dropdown-item" href="<?= base_url('/reportes'); ?>">Reportes <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                      <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                    </svg>
                  </a></li>
              <?php endif ?>

              <li><a class="dropdown-item" href="<?= base_url('/salir'); ?>">Cerrar sesión <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                  </svg></a></li>
            </ul>
          </li>

        </ul>

      </div>

    </div>

  </nav>