<?php
require_once("../includes/header.php");
require_once("../includes/database.php");


// récupérer les disciplines avec leur coach
$sql = "SELECT d.nom AS discipline_nom, d.description, d.photo AS distof, u.pseudo AS coach_pseudo, u.photo AS coachtof
        FROM discipline d
        JOIN utilisateur u ON d.id_discipline = u.id_discipline
        WHERE u.role = 'coach'";
$stmt = $db->prepare($sql);
$stmt->execute();
$disciplines = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .coach-img-mini {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
    }
  </style>
</head>
<body>
<div class="d-flex justify-content-end mb-3">
  <a href="adddis.php" class="btn btn-primary">
    ➕ Ajouter une discipline
  </a>
</div>
<div class="container mt-5">
  <h2 class="text-center mb-4">Liste des Disciplines de Lynxgym</h2>

  <?php if (count($disciplines) > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
          <tr>
            <th>Discipline</th>
            <th>photo</th>
            <th>Description</th>
            <th>Coach chargé</th>
            <th>Profil du coach</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($disciplines as $d): ?>
            <?php
              $photoC = $d['coachtof'] ?? null;
              $cheminImageC = $photoC ? "../assets/Images/" . htmlspecialchars($photoC) : "../assets/unclient-min.jpg";

              $photoD = $d['distof'] ?? null;
              $cheminImageD = $photoD ? "../assets/Images/" . htmlspecialchars($photoD) : "../assets/cross-fit0.jpg";
            
            ?>
            <tr>
              <td class="text-center"><?= htmlspecialchars($d['discipline_nom']) ?></td>
              <td class="text-center">
                <img src="<?= $cheminImageD ?>" class="coach-img-mini" alt=" <?= htmlspecialchars($d['discipline_nom']) ?>">
              </td>
              <td><?= nl2br(htmlspecialchars($d['description'])) ?></td>
              <td class="text-center"><?= htmlspecialchars($d['coach_pseudo']) ?></td>
              <td class="text-center">
                <img src="<?= $cheminImageC ?>" class="coach-img-mini" alt="Coach <?= htmlspecialchars($d['coach_pseudo']) ?>">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <p class="text-center text-muted">Aucune discipline avec coach trouvé pour le moment.</p>
  <?php endif; ?>
</div>

</body>
