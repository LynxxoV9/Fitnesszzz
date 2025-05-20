<!-- ajouter_equipement.php -->
<?php
$conn = new PDO("mysql:host=localhost;dbname=lynxgym", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = $_POST['nom'];
  $quantite = $_POST['quantite'];
  $etat = $_POST['etat'];

  // Sauvegarder l’image dans "uploads/"
  $photoName = $_FILES['photo']['name'];
  $photoPath = 'uploads/' . basename($photoName);
  move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

  // Insérer dans la base
  $stmt = $conn->prepare("INSERT INTO equipement (nom, quantite, etat, photo) VALUES (?, ?, ?, ?)");
  $stmt->execute([$nom, $quantite, $etat, $photoPath]);

  header("Location: equipements.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un équipement</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
  <div class="container py-5">
    <h2 class="text-danger mb-4">Ajouter un Équipement</h2>
    <form method="POST" enctype="multipart/form-data" class="bg-light text-dark p-4 rounded shadow w-50 mx-auto">
      <div class="mb-3">
        <label class="form-label">Nom de l'équipement</label>
        <input type="text" name="nom" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Quantité</label>
        <input type="number" name="quantite" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">État</label>
        <select name="etat" class="form-select" required>
          <option value="Neuf">Neuf</option>
          <option value="Bon état">Bon état</option>
          <option value="Usé">Usé</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" accept="image/*" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-danger w-100">Ajouter</button>
    </form>
  </div>
</body>
</html>
