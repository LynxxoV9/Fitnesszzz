<?php



require_once("../includes/database.php");
require_once("../includes/header.php");


$equipements = $db->query("SELECT * FROM equipement")->fetchAll(PDO::FETCH_ASSOC);
?>


<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .equipement-card {
      width: 250px;
      margin: 10px;
    }
    .equipement-photo {
      height: 150px;
      object-fit: cover;
    }
  </style>
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-danger">Nos Installations</h2>
      <a href="ajouter_equipement.php" class="btn btn-danger">Ajouter un équipement</a>
    </div>

    <div class="d-flex flex-wrap justify-content-start">
      <?php foreach ($equipements as $eq): ?>
        <div class="card text-dark equipement-card">
          <img src="<?= htmlspecialchars($eq['photo']) ?>" class="card-img-top equipement-photo" alt="Photo équipement">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($eq['nom']) ?></h5>
            <p class="card-text">Quantité : <?= $eq['quantite'] ?></p>
            <p class="card-text">État : <?= htmlspecialchars($eq['etat']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
