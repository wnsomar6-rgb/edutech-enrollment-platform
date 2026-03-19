<?php
// Récupération des données du formulaire
$nom = htmlspecialchars(trim($_POST["nom"]));
$prenom = htmlspecialchars(trim($_POST["prenom"]));
$email = htmlspecialchars(trim($_POST["email"]));
$telephone = htmlspecialchars(trim($_POST["telephone"]));
$dateNaissance = htmlspecialchars(trim($_POST["dateNaissance"]));
$adresse = htmlspecialchars(trim($_POST["adresse"]));
$formation = htmlspecialchars(trim($_POST["formation"]));
$niveau = htmlspecialchars(trim($_POST["niveau"]));
$motivation = htmlspecialchars(trim($_POST["motivation"]));

// Date d'inscription
$date_inscription = date("Y-m-d H:i:s");

// Génération d'un identifiant unique
$inscription_id = uniqid("INS_");

// Formatage des données pour enregistrement
$data = "ID: $inscription_id" . PHP_EOL .
        "Date: $date_inscription" . PHP_EOL .
        "Nom: $nom" . PHP_EOL .
        "Prénom: $prenom" . PHP_EOL .
        "Email: $email" . PHP_EOL .
        "Téléphone: $telephone" . PHP_EOL .
        "Date de naissance: $dateNaissance" . PHP_EOL .
        "Adresse: $adresse" . PHP_EOL .
        "Formation: $formation" . PHP_EOL .
        "Niveau d'études: $niveau" . PHP_EOL .
        "Motivation: $motivation" . PHP_EOL .
        "Statut: En attente de paiement" . PHP_EOL . 
        "------------------------" . PHP_EOL;

// Nom du fichier où seront stockées les inscriptions
$file = 'inscriptions.txt';

// Enregistrement des données
if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
    // Redirection vers la page de paiement avec les paramètres nécessaires
    header("Location: paiement.html?inscription_id=$inscription_id&formation=$formation&email=$email&nom=$nom&prenom=$prenom");
    exit;
} else {
    // En cas d'erreur
    echo "Une erreur s'est produite lors de l'enregistrement de votre inscription. Veuillez réessayer.";
    echo "<br><a href='inscription.html'>Retour au formulaire d'inscription</a>";
}
?>