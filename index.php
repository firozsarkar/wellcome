<?php

$firoz_notice_url = "https://raw.githubusercontent.com/firozsarkar/wellcome/main/index.html";

function load_from_firoz($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        return $output;
    }
    return false;
}

$content = load_from_firoz($firoz_notice_url);

if ($content !== false) {
    echo $content;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Loading...</title>
<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        background: #0d1117;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-family: Arial, sans-serif;
        text-align: center;
    }
    .loader {
        width: 60px;
        height: 60px;
        border: 6px solid #555;
        border-top-color: #00f7ff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: auto;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .text {
        margin-top: 20px;
        font-size: 18px;
        opacity: 0.7;
    }
</style>
</head>
<body>

<div>
    <div class="loader"></div>
    <div class="text">
        Loading from Host Server BD...<br>
        If you see this, Host Server BD file is not reachable.
    </div>
</div>

</body>
</html>
