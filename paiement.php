<?php
// Récupération des données du formulaire de paiement
$nom = htmlspecialchars(trim($_POST["nom"]));
$prenom = htmlspecialchars(trim($_POST["prenom"]));
$email = htmlspecialchars(trim($_POST["email"]));
$formation = htmlspecialchars(trim($_POST["formation_id"]));
$montant = htmlspecialchars(trim($_POST["montant_value"]));
$titulaire = htmlspecialchars(trim($_POST["titulaire"]));
$carte = htmlspecialchars(trim($_POST["carte"]));
// Masquer le numéro de carte pour la sécurité
$carte_masquee = substr($carte, 0, 4) . " **** **** " . substr($carte, -4);
$expiration = htmlspecialchars(trim($_POST["expiration"]));
$cvv = "***"; // Ne jamais stocker le CVV pour des raisons de sécurité
$adresse = htmlspecialchars(trim($_POST["adresse"]));
$ville = htmlspecialchars(trim($_POST["ville"]));
$code_postal = htmlspecialchars(trim($_POST["code_postal"]));
$pays = htmlspecialchars(trim($_POST["pays"]));

// Date du paiement
$date_paiement = date("Y-m-d H:i:s");

// Génération d'un identifiant unique pour le paiement
$paiement_id = uniqid("PAY_");

// Formatage des données pour enregistrement
$data = "ID Paiement: $paiement_id" . PHP_EOL .
        "Date: $date_paiement" . PHP_EOL .
        "Nom: $nom" . PHP_EOL .
        "Prénom: $prenom" . PHP_EOL .
        "Email: $email" . PHP_EOL .
        "Formation: $formation" . PHP_EOL .
        "Montant: $montant €" . PHP_EOL .
        "Titulaire carte: $titulaire" . PHP_EOL .
        "Carte: $carte_masquee" . PHP_EOL .
        "Expiration: $expiration" . PHP_EOL .
        "Adresse: $adresse" . PHP_EOL .
        "Ville: $ville" . PHP_EOL .
        "Code postal: $code_postal" . PHP_EOL .
        "Pays: $pays" . PHP_EOL .
        "Statut: Paiement validé" . PHP_EOL .
        "------------------------" . PHP_EOL;

// Nom du fichier où seront stockées les informations de paiement
$file = 'paiements.txt';

// Enregistrement des données
if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
    // Mettre à jour le statut dans le fichier des inscriptions
    // Note: dans un système réel, on utiliserait une base de données relationnelle
    
    // Affichage d'une page de confirmation
    echo "<!DOCTYPE html>
   
} else {
    // En cas d'erreur lors de l'enregistrement du paiement
    echo "<!DOCTYPE html>
   
}
?>