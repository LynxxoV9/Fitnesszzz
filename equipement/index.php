<?php
require_once("../includes/database.php");
require_once("../includes/header.php");

$equipements = $db->query("SELECT * FROM equipement")->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .equipement-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
    }

    .equipement-card {
      flex: 1 1 calc(33.333% - 20px); /* 3 par ligne */
      background-color: white;
      color: black;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
      display: flex;
      flex-direction: column;
    }

    .equipement-photo {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    @media (max-width: 992px) {
      .equipement-card {
        flex: 1 1 calc(50% - 20px); /* 2 par ligne sur tablette */
      }
    }

    @media (max-width: 768px) {
      .equipement-card {
        flex: 1 1 100%; /* 1 par ligne sur mobile */
      }
    }
  </style>
</head>

<body class="bg-dark text-white">
  <div class="container py-6">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-danger">Nos Installations</h2>
      <a href="addequip.php" class="btn btn-danger">Nouvel équipement</a>
    </div>

    <div class="equipement-grid">
      <?php foreach ($equipements as $eq): ?>
        <div class="equipement-card">
          <img src="<?= htmlspecialchars($eq['photo']) ?>" class="equipement-photo" alt="Photo équipement">
          <div class="p-3">
            <h5><?= htmlspecialchars($eq['nom']) ?></h5>
            <p>Quantité : <?= $eq['quantite'] ?></p>
            <p>État : <?= htmlspecialchars($eq['etat']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
