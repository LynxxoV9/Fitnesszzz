<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fit Man</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fitness Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .custom-navbar {
      background-color: #b30000; 
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .custom-navbar .navbar-brand {
      font-size: 2.2rem;
      font-weight: bold;
      color: #fff !important;
    }

    .custom-navbar .nav-link {
      font-size: 1.1rem;
      color: #fff !important;
      margin-left: 20px;
    }

    .custom-navbar .nav-link:hover {
      color: #ffdddd !important;
    }

    .navbar-toggler {
      background-color: #fff;
    }

    .dropdown-menu {
      background-color: #f8f9fa;
    }

    .dropdown-menu a {
      color: #000 !important;
    }

    .dropdown-menu a:hover {
      background-color: #ddd;
    }

    .navbar-nav .dropdown img {
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
      transition: transform 0.2s ease;
    }

    .navbar-nav .dropdown img:hover {
      transform: scale(1.05);
    }

    #btitle {
      color: #ffffff;
      padding-left: 10px;
      font-family: "Arial", sans-serif;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#">
      🏋️ <span id="btitle">LYNXGYM CLUB</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="coach/index.php">Coach</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Gestion</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Utilisateurs</a></li>
            <li><a class="dropdown-item" href="#">Équipements</a></li>
            <li><a class="dropdown-item" href="../discipline/dis.php">Disciplines</a></li>
          </ul>
        </li>
      </ul>

      <!-- Barre de recherche -->
      <form class="d-flex me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Rechercher">
        <button class="btn btn-dark" type="submit">🔍</button>
      </form>

      <!-- Profil utilisateur -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" alt="Profil" width="40" height="40" class="me-2">
            <span class="d-none d-lg-inline">Profil</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="#">🔑 Se connecter</a></li>
            <li><a class="dropdown-item" href="../user/adduser.php">📝 S’inscrire</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">🚪 Se déconnecter</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

