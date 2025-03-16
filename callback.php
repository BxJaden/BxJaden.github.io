<?php
// Get the authorization code from the query parameter
$code = $_GET['code'];

// Set up Discord OAuth2 token request
$client_id = '1118403131114524725';
$client_secret = 'Osh_7tWbSnrVtKovej27f-Yu1B551xKP';
$redirect_uri = 'http://terms.bxjaden524.xyz/callback.php';

$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $code,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri
];

// Use cURL to request access token
$ch = curl_init('https://discord.com/api/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);
curl_close($ch);

// Decode the response and get the access token
$responseData = json_decode($response, true);
$access_token = $responseData['access_token'];

// Fetch user info using the access token
$userInfo = file_get_contents('https://discord.com/api/v10/users/@me', false, stream_context_create([
    'http' => [
        'header' => 'Authorization: Bearer ' . $access_token
    ]
]));

// Save user info (e.g., in session or localStorage)
$user = json_decode($userInfo, true);
file_put_contents('user_info.json', json_encode($user));

echo "Logged in as: " . $user['username'];
?>
