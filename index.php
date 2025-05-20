<?php


    require_once("includes/header.php");
    require_once("inback.php");



?>
<head>
    <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background-image: url('assets/muscu.jpg');
      background-size: cover;
      background-position: center;
      height: 90vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 8px black;
    }
    .hero h1 {
      font-size: 4.3rem;
      font-weight: bold;
    }
    .section-title {
      text-align: center;
      margin: 3rem 0 1rem;
      font-weight: bold;
      font-size: 2.5rem;
      color: #e31111;
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
    footer {
      background-color:"red";
      color: #fff;
      text-align: center;
      padding: 2rem 0;
      margin-top: 4rem;
    }
    p{
        font-size: 28px;
    }
    
  </style>
</head>
<body>


<div class="hero text-center">
  <div>
    <h1>Bienvenue chez Lynxgym</h1>
    <p>"Votre club de fitness pour équilibrer un esprit sain dans un corps sain !"</p>
    <a href="#discipline" class="btn btn-danger btn-lg mt-3">S'abonner</a>
  </div>
</div>

<!-- À propos -->
<section class="container mt-5">
  <h2 class="section-title">À propos de nous</h2>
  <p class="text-center">
    Lynxgym est un centre de remise en forme moderne où se mêlent performance, bien-être et communauté.
    Nos coachs certifiés vous accompagnent chaque semaine selon votre abonnement, dans un environnement motivant et chaleureux.
  </p>
</section>

<!-- Disciplines -->
<section id="discipline" class="container mt-5">
  <h2 class="section-title">Nos Disciplines</h2>
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1599058917212-d9ee93b99154" class="card-img-top" alt="Musculation">
        <div class="card-body text-center">
          <h5 class="card-title">Musculation</h5>
          <p class="card-text">Développez votre force et sculptez votre corps avec des équipements professionnels.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1594737625785-c94d3d50d428" class="card-img-top" alt="Cardio">
        <div class="card-body text-center">
          <h5 class="card-title">Cardio</h5>
          <p class="card-text">Améliorez votre endurance et votre santé avec nos séances de cardio variées.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1" class="card-img-top" alt="Yoga / Stretching">
        <div class="card-body text-center">
          <h5 class="card-title">Yoga & Stretching</h5>
          <p class="card-text">Apaisez votre esprit, travaillez votre souplesse et réduisez le stress.</p>
        </div>
      </div>
    </div>
  </div>
  <center><a href="#discipline" class="btn btn-danger btn-lg mt-3">Plus de disciplines</a></center>
</section>

    <!-- section des coachs -->
<section class="container mt-5">
  <h2 class="section-title">Nos Coachs</h2>
  <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
  
    <?php 
    for ($i = 0; $i < 3 && $i < count($utilisateurs); $i++):
        $user = $utilisateurs[$i];
    ?>

      <div class="col-md-3 text-center" style="margin-bottom: 20px;">
        <img src="assets/uncoach.jpg" class="rounded-circle mb-2" width="120">
        <h5>Coach <?= htmlspecialchars($user["pseudo"]); ?></h5>
        <p><?= htmlspecialchars($user["specialite"]); ?></p>
      </div>
    <?php endfor; ?>

  </div>
</section>
        

  <center><a href="coach/index.php" class="btn btn-danger btn-lg mt-3">En savoir plus sur nos Coachs</a></center>
</section>

<!-- Témoignages -->
<section class="container mt-5">
  <h2 class="section-title">Témoignages</h2>
  <blockquote class="blockquote text-center">
    <p>"Depuis que je suis chez Lynxgym, je me sens plus fort et plus confiant !"</p>
    <footer class="blockquote-footer">Kevin A., membre depuis 6 mois</footer>
  </blockquote>
  <blockquote class="blockquote text-center">
    <p>"Des coachs professionnels et une ambiance familiale. J'adore 💪"</p>
    <footer class="blockquote-footer">Mariam T., abonnée annuelle</footer>
  </blockquote>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Lynxgym | Club de Fitness | Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>