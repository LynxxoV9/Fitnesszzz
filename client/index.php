<?php
require_once("../includes/database.php");
require_once("../includes/header.php");

$abonnement = $_GET['abonnement'] ?? '';
$sql = "SELECT * FROM utilisateur";
$params = [];

if ($abonnement) {
    $sql .= " WHERE type_abonnement = ? AND role='client'";
    $params[] = $abonnement;
}

$clients = $db->prepare($sql);
$clients->execute($params);
$infos= $clients->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nos Clients</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-danger">Liste des Clients</h2>
      <a href="../user/adduser.php" class="btn btn-danger">Nouveau client</a>
    </div>

    <form method="GET" class="mb-4">
      <div class="input-group">
        <select name="abonnement" class="form-select">
          <option value="">-- Tous les abonnements --</option>
          <option value="journalier" <?= $abonnement == 'journalier' ? 'selected' : '' ?>>Journalier</option>
          <option value="mensuel" <?= $abonnement == 'mensuel' ? 'selected' : '' ?>>Mensuel</option>
          <option value="annuel" <?= $abonnement == 'annuel' ? 'selected' : '' ?>>Annuel</option>
          <option value="illimité" <?= $abonnement == 'illimité' ? 'selected' : '' ?>>Illimité</option>
        </select>
        <button class="btn btn-outline-light" type="submit">Filtrer</button>
      </div>
    </form>

    <div class="table-responsive bg-light text-dark rounded shadow">
      <table class="table table-bordered table-hover mb-0">
        <thead class="table-danger text-center">
          <tr>
            <th>Photo</th>
            <th>Pseudo</th>
            <th>Nom Complet</th>
            <th>Discipline</th>
            <th>Type d'abonnement</th>
          </tr>
        </thead>
        <tbody class="text-center align-middle">
          <?php foreach ($infos as $client): ?>
            <tr>
              <?php
$cheminImageC = !empty($client['photo']) 
    ? "../assets/Images/" . htmlspecialchars($client['photo']) 
    : "../assets/client_lili-min.jpg";
?>
                <td>
                    <img src="<?= $cheminImageC ?>" alt="Photo" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                </td>
              <td><?= htmlspecialchars($client['pseudo']) ?></td>
              <td><?= htmlspecialchars($client['nom_complet']) ?></td>
              <td><?= htmlspecialchars($client['discipline']) ?></td>
              <td><?= htmlspecialchars($client['type_abonnement']) ?></td>
            </tr>
          <?php endforeach; ?>
          <?php if (count($infos) === 0): ?>
            <tr><td colspan="5">Aucun client trouvé pour cet abonnement.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
