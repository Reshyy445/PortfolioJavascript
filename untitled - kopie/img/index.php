<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg de gegevens van het formulier
    $name = htmlspecialchars($_POST['name']); // Sanitizing input to prevent XSS
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Hier kun je de gegevens verwerken, bijvoorbeeld naar een database sturen of een e-mail verzenden.
    // Voorbeeld van het verzenden van een e-mail:
    $to = "jouw-email@example.com"; // Vervang dit met je eigen e-mailadres
    $subject = "Nieuw contactformulier bericht van $name";
    $body = "Naam: $name\nE-mail: $email\nBericht:\n$message";
    $headers = "From: $email";

    // Probeer de e-mail te verzenden
    if (mail($to, $subject, $body, $headers)) {
        echo "Bedankt, $name! We nemen zo snel mogelijk contact met je op.";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.";
    }
} else {
    // Als het formulier niet via POST is verzonden, toon een foutmelding
    echo "Ongeldig verzoek.";
}
?>