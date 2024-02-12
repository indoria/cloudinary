<?php

require_once('common.php');


use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


Configuration::instance($cloudinaryURL);

$uploadApi = new UploadApi();

$productImageUrl = 'https://qbmaster.idworks.com/sites/1083/products/74152.jpg';

$logoUrl1 = 'https://api.idworks.com/logo_new_y.png';
$logoUrl2 = 'https://api.idworks.com/logo_new_y.png';

$encodedOverlayUrl1 = base64_encode($logoUrl1);
$encodedOverlayUrl2 = base64_encode($logoUrl2);

$response = $uploadApi->upload($productImageUrl, [
    'delivery_type' => 'fetch',
    'transformation' => [
        [
            'overlay' => '/sites/1083/products/74152.jpg',
            'width' => 100,
            'gravity' => 'south_west',
            'x' => 30,
            'y' => 30,
            'opacity' => 80
        ],
        [
            'flags' => 'layer_apply'
        ],
        [
            'overlay' => '/sites/1083/products/74152.jpg',
            'width' => 100,
            'gravity' => 'south_west',
            'x' => 30,
            'y' => 30,
            'opacity' => 80
        ],
        [
            'flags' => 'layer_apply'
        ],
    ]
]);

echo $response['secure_url'];