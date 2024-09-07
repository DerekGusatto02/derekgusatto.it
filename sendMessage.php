<?php
$paginaHTML=file_get_contents("emailresult.html");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero dei dati dal form
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));
    

    // Controllo dei dati
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Messaggio di errore se i campi sono vuoti o l'email non è valida
        $result =  "<p>Please fill in all fields and provide a valid email. <br> <a href=\"contacts.php\">Retry to fill the form</a></p>";
        $paginaHTML=str_replace("{result}",$result,$paginaHTML);
echo $paginaHTML;
        exit;
    }

    // Impostazioni dell'email
    $to = "gusattoderek@gmail.com"; // Sostituisci con il tuo indirizzo email
    $to_we = "postmaster@derekgusatto.it"; // Sostituisci con il tuo indirizzo email
    $subject = "Nuovo messaggio dal tuo sito web";
    $email_content = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$message\n";

    // Headers dell'email
    $headers = "From: $name <$email>";

    // Invio dell'email
    if (mail($to, $subject, $email_content, $headers) && mail($to_we, $subject, $email_content, $headers)) {
        $result =  "<p>Thanks! Your message has been sent. <br> You can return to the <a href=\"index.php\">home page</a></p>";
        $paginaHTML=str_replace("{result}",$result,$paginaHTML);
echo $paginaHTML;
        exit;
    } else {
        $result =  "<p>Sorry, an error occurred while sending the message . <br> <a href=\"contacts.php\">Please try again</a></p>";
        $paginaHTML=str_replace("{result}",$result,$paginaHTML);
        echo $paginaHTML;
        exit;
    }
} else {
    $result =  "<p>Sorry, an error occurred while sending the message . <br> <a href=\"contacts.php\">Please try again</a></p>";
    $paginaHTML=str_replace("{result}",$result,$paginaHTML);
echo $paginaHTML;
    exit;
}


