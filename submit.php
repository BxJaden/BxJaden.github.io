<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $discord = $_POST["discord"];
    $botType = $_POST["botType"];

    // Send data to Discord webhook
    $webhookURL = "https://discord.com/api/webhooks/1178424984117444780/v6jaLf9bkKGUejG2G2rmnIeGjFnqSjii9QqhIbvqdNuhwVrBsuIKEr_efOeS8_g873DX";
    $data = [
        "content" => "New Bot Request:\nName: $name\nDiscord: $discord\nBot Type: $botType"
    ];

    $ch = curl_init($webhookURL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}
?>
