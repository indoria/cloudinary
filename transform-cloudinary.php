<?php
require_once('common.php');

use Cloudinary\Configuration\Configuration;
use Cloudinary\Cloudinary;

Configuration::instance($cloudinaryURL);

$cloudinary = new Cloudinary();

$productImageURL = 'https://www.afhsgear.com/sites/450/products/80305.jpg';

$logoURL1 = 'https://api.idworks.com/logo_new_y.png';
$logoURL2 = 'https://api.idworks.com/logo_new_y.png';

$logoURL1Encoded = base64_encode($logoURL1);
$logoURL2Encoded = base64_encode($logoURL2);

$imageUrl = $cloudinary->image($productImageURL)
    ->deliveryType('fetch')
    ->transformation([
        (new Transformation())->overlay(['url' => 'fetch:' . $logoURL1Encoded])
                              ->width(300)
                              ->gravity(Transformation::GRAVITY_SOUTH_EAST)
                              ->x(600)
                              ->y(-150)
                              ->crop(Transformation::CROP_SCALE),
        (new Transformation())->flags(Transformation::FLAG_LAYER_APPLY),
        
        
        (new Transformation())->overlay(['url' => 'fetch:' . $logoURL2Encoded])
                              ->width(200)
                              ->gravity(Transformation::GRAVITY_NORTH_WEST)
                              ->x(100)
                              ->y(100)
                              ->crop(Transformation::CROP_SCALE),
        (new Transformation())->flags(Transformation::FLAG_LAYER_APPLY),
    ])
    ->toUrl();

echo $imageUrl;
