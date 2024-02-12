<html lang="HTML5">

<head>
    <title>PHP Quick Start</title>
</head>

<body>
<?php
require_once("common.php");

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;


Configuration::instance($cloudinaryURL);

require_once('common.php');

$upload = new UploadApi();

$productImageID = 'sites/450/products/80305.jpg';
$productImageURL = "https://www.afhsgear.com/$productImageID";
//$productImageURL = 'https://res.cloudinary.com/demo/image/upload/flower.jpg';

/*
$uploadResponse = $upload->upload(
    $productImageURL,
    [
        'delivery_type' => 'fetch',
    ]
);
*/


$response = $upload->upload($productImageURL, [
    'public_id' => $productImageID,
    'type' => 'fetch',
    'delivery_type' => 'fetch'
]);

echo '<pre>';
echo json_encode($response, JSON_PRETTY_PRINT);
echo '</pre>';


?>
</body>

</html>


