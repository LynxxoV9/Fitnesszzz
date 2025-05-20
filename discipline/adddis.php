<?php
require_once("../includes/header.php");
require_once("../includes/database.php");

$erreurs = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $photo = $_FILES['photo'] ?? null;

    // boffff encore une vérification
    if (empty($nom)) $erreurs[] = "Le nom de la discipline est requis.";
    if (empty($description)) $erreurs[] = "La description est requise.";

    // les managements de l'image boff bofff
    $nomFichierImage = null;
    if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
        $dossierImages = "../assets/Images/";
        $extension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        $fichierTemporaire = $photo['tmp_name'];

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $nomFichierImage = uniqid('discipline_') . '.' . $extension;
            move_uploaded_file($fichierTemporaire, $dossierImages . $nomFichierImage);
        } else {
            $erreurs[] = "Format d'image non supporté. Formats autorisés : jpg, jpeg, png, gif.";
        }
    }

    // Insertion 
    if (empty($erreurs)) {
        $sql = "INSERT INTO discipline (nom, description, photo) VALUES (:nom, :description, :photo)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':description' => $description,
            ':photo' => $nomFichierImage
        ]);
        $message = "Discipline ajoutée avec succès !";
    }
}
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
  <h2 class="mb-4 text-center">Ajouter une nouvelle discipline</h2>

  <?php if (!empty($erreurs)): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($erreurs as $err): ?>
          <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php elseif (!empty($message)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data" class="border rounded p-4 bg-light shadow" style="background-color: #b30000">
    <div class="mb-3">
      <label for="nom" class="form-label">Nom de la discipline</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="photo" class="form-label">Image illustrative (JPG, PNG, GIF)</label>
      <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary w-100">Ajouter la discipline</button>
  </form>
</div>
</body>
