<?php

            require_once("includes/database.php");
$sql = "SELECT * FROM utilisateur WHERE role='coach'";
$stmt = $db->prepare($sql);
$stmt->execute();

$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);


