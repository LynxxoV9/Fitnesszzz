<?php
require_once("../includes/database.php");
require_once("../includes/header.php");

$erreur = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_complet = $_POST["nom"] ?? "";
    $pseudo = $_POST["pseudo"] ?? "";
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    $role = $_POST["role"] ?? "client";
    $specialite = $_POST["specialite"] ?? "";
    $experience = $_POST["experience"] ?? "";
    $date_inscription = date("Y-m-d");
    $type_abonnement = $_POST["abonnement"] ?? "";
    
                $req = "SELECT id_discipline FROM discipline WHERE nom = ?";
                $traitement = $db->prepare($req);
                $traitement->execute([$specialite]);
                $idRow = $traitement->fetch(PDO::FETCH_ASSOC);

                if ($idRow) {
                    $id_discipline = $idRow['id_discipline'];

                    echo "<pre style='background:#fff3cd;padding:10px;border:1px solid #ffeeba;color:#856404'>";
                    echo "DEBUG - ID Discipline récupéré : ";
                    print_r($id_discipline);
                    echo "</pre>";
                } else {
                    $erreur = "Spécialité non trouvée dans la base de données.";
                }

    $photo = null;
    $errors = [];

    if (isset($_FILES['unetof'])) {
        $matof = $_FILES['unetof'];
        $filename = $matof['name'];
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if ($matof['error'] == 0) {
            if ($matof['size'] > 8000000) {
                $errors[] = "Image trop volumineuse (>8Mo)";
            } else {
                $autorized_extensions = ['png', 'jpg', 'jpeg', 'jfif'];
                if (empty($extension) || !in_array($extension, $autorized_extensions)) {
                    $errors[] = $extension ? "Extension .$extension non autorisée" : "Fichier sans extension";
                } else {
                    $upload_dir = __DIR__ . '/../assets/Images/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $prefix = 'user_';
                    $unique = bin2hex(random_bytes(8));
                    $new_filename = $prefix . $unique . '.' . $extension;
                    $destination = $upload_dir . $new_filename;

                    if (move_uploaded_file($matof['tmp_name'], $destination)) {
                        $photo = $new_filename;
                    } else {
                        $upload_error = error_get_last();
                        $errors[] = "Échec de l'upload: " . ($upload_error ? $upload_error['message'] : 'Erreur inconnue');
                    }
                }
            }
        } else {
            $errors[] = "Erreur upload: code " . $matof['error'];
        }
    } else {
        $errors[] = "Aucune image envoyée";
    }

    if (!empty($nom_complet) && !empty($pseudo) && !empty($_POST["mot_de_passe"])) {
        $sql = "INSERT INTO utilisateur (nom_complet, pseudo, mot_de_passe, role, photo, specialite, experience_pro, date_inscription, type_abonnement, id_discipline)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$nom_complet, $pseudo, $mot_de_passe, $role, $photo, $specialite, $experience, $date_inscription, $type_abonnement, $id_discipline])) {
            $success = "Utilisateur ajouté avec succès !";
        } else {
            $erreur = "Erreur lors de l'ajout.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs requis.";
    }

    if (!empty($errors)) {
        $erreur = implode("<br>", $errors);
    }
}
if ($success) {
    header("Location: ../index.php");
    exit();
}

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="mx-auto p-4 rounded" style="max-width: 650px; background-color: #b30000;">
        <h2 class="text-center text-white mb-4">Ajouter un Utilisateur</h2>

        <?php if ($erreur): ?>
            <div class="alert alert-danger"><?= $erreur ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-white">Nom complet *</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Pseudo *</label>
                <input type="text" name="pseudo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Mot de passe *</label>
                <input type="password" name="mot_de_passe" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Rôle</label>
                <select name="role" class="form-control">
                    <option value="client">Client</option>
                    <option value="coach">Coach</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="unetof" class="form-label text-white">Ajouter une photo *</label>
                <input type="file" class="form-control" id="unetof" name="unetof" />
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Spécialité *</label>
                <select name="specialite" class="form-control" required>
                    <option value="">-- Sélectionner une spécialité --</option>
                    <option value="Musculation">Musculation</option>
                    <option value="Cardio">Cardio</option>
                    <option value="Zumba">Zumba</option>
                    <option value="Dance fitness">Dance fitness</option>
                    <option value="CrossFit">CrossFit</option>
                    <option value="Boxe">Boxe</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Pilates">Pilates</option>
                    <option value="Meditation">Meditation</option>
                    <option value="HIIT">HIIT</option>
                    <option value="Cycling">Cycling</option>
                    <option value="Pushup">Pushup</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label text-white">Expérience</label>
                <input type="text" name="experience" class="form-control" placeholder="Ex: 3 ans de coaching sportif">
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Type d’abonnement</label>
                <input type="text" name="abonnement" class="form-control" placeholder="Mensuel, Annuel...">
            </div>

            <div class="mb-3">
                <input type="hidden" name="id_discipline" value="<?= htmlspecialchars($id_discipline ?? '') ?>" class="form-control">

            <button type="submit" class="btn btn-primary w-100"><h4>Ajouter</h4></button>
        </form>
    </div>
</div>
</body>
</html>


