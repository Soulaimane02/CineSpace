<?php
function get_habbo_item_info($item_name) 
{
    $base_url = 'https://www.habbo.com/api/public/marketplace/stats/roomitem/';
    $url = $base_url . urlencode($item_name);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_code === 200 && $response !== false) 
    {
        $item_info = json_decode($response, true);
        return $item_info;
    } else 
    {
        return null;
    }

    curl_close($ch);
}

$item_name = $_GET['vetement'] ?? '';

if (!empty($item_name)) 
{
    $item_info = get_habbo_item_info($item_name);
    if ($item_info !== null) 
    {
        echo "Il y a un item.";
        echo "<pre>";
        print_r($item_info);
        echo "</pre>";
    } else {
        echo "Impossible de récupérer les informations pour l'objet '{$item_name}'.";
    }
}

var_dump($item_name);
?>
