<?php


require_once("../includes/header.php");
require_once("../includes/database.php");
require_once("../inback.php");


?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .coach-block {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f9f9f9;
    }
    .coach-img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }
    .coach-info h5 {
      font-size: 1.5rem;
      font-weight: bold;
    }
    .coach-info p {
      margin: 5px 0;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Les coachs de Lynxgym</h2>

    <h4 class="mt-5 mb-3">Liste des Coachs (Tableau)</h4>
  <div class="table-responsive mb-5">
    <table class="table table-bordered table-hover">
      <thead class="table-dark text-center">
        <tr>
          <th>Photo</th>
          <th>Pseudo</th>
          <th>Spécialité</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($utilisateurs as $coach): ?>
          <?php
            $photo = $coach['photo'] ?? null;
            $cheminImage = $photo ? "../assets/Images/" . htmlspecialchars($photo) : "../assets/unclient-min.jpg";
          ?>
          <tr class="align-middle text-center">
            <td>
              <img src="<?= $cheminImage ?>" alt="Coach <?= htmlspecialchars($coach['pseudo']) ?>" style="width:60px; height:60px; object-fit:cover; border-radius:50%;">
            </td>
            <td><?= htmlspecialchars($coach['pseudo']) ?></td>
            <td><?= htmlspecialchars($coach['specialite'] ?? 'Musculation') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

    <h2 class="text-center mb-4" style="color: #b30000">Qui sont nos coachs qui vont vous suivre dans vos séances... ?</h2>

  <?php foreach ($utilisateurs as $coach): ?>
    <?php
        $photo = $coach['photo'] ?? null;
        $cheminImage = $photo ? "../assets/Images/" . htmlspecialchars($photo) : "../assets/unclient-min.jpg";
        //die($cheminImage);
    ?>

    <div class="coach-block row align-items-center">
      <div class="col-md-4 text-center">
        <img src="<?= $cheminImage ?>" alt="Coach <?= htmlspecialchars($coach['pseudo']) ?>" class="coach-img">
      </div>
      <div class="col-md-8 coach-info">
        <h5><?= htmlspecialchars($coach['pseudo']) ?></h5>
        <p><strong>Nom cmoplet :</strong> <?= htmlspecialchars($coach['nom_complet'] ?? 'Lynx Linux') ?></p>
        <p><strong>Spécialité :</strong> <?= htmlspecialchars($coach['specialite'] ?? 'Musculation') ?></p>
        <p><strong>Expérience professionnelle :</strong> <?= htmlspecialchars($coach['experience_pro'] ?? 'Non spécifiée') ?></p>
        <p><strong>Chez Lynxgym depuis :</strong> 
          <?php
            $dateInscription = new DateTime($coach['date_inscription']);
            $now = new DateTime();
            $anciennete = $dateInscription->diff($now)->y;
            echo $anciennete . ' an(s)';
          ?>
        </p>
      </div>
    </div>
  <?php endforeach; ?>
</div>

</body>
