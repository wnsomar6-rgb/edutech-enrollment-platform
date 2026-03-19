<?php
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $dateNaissance   = htmlspecialchars(trim($_POST["dateNaissance"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $data = "Nom et prénom: $name" . PHP_EOL .
            "Email: $email" . PHP_EOL .
            "Telephone: $phone" . PHP_EOL .
            "Date de Naissance: $dateNaissance" . PHP_EOL .
            "Message: $message" . PHP_EOL .
            "------------------------" . PHP_EOL;

    $file = 'contacts.txt';
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Votre message a été enregistré. Merci!";
    } else {
        echo "Une erreur s’est produite lors de l’enregistrement de votre message. Veuillez réessayer.";
    }
?>
