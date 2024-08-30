<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero dei dati dal form
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Controllo dei dati
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Messaggio di errore se i campi sono vuoti o l'email non è valida
        echo "Si prega di compilare tutti i campi e fornire un'email valida.";
        exit;
    }

    // Impostazioni dell'email
    $to = "gusattoderek@gmail.com.com"; // Sostituisci con il tuo indirizzo email
    $to_we = "postmaster@derekgusatto.it"; // Sostituisci con il tuo indirizzo email
    $subject = "Nuovo messaggio dal tuo sito web";
    $email_content = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$message\n";

    // Headers dell'email
    $headers = "From: $name <$email>";

    // Invio dell'email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Grazie! Il tuo messaggio è stato inviato con successo.";
    } else {
        echo "Spiacente, si è verificato un errore durante l'invio del tuo messaggio.";
    }
} else {
    echo "Errore di invio del modulo.";
}

