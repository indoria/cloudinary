<?php
require_once('common.php');

use Cloudinary\Configuration\Configuration;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Transformation;

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




$url = $cloudinary->image('base_image.jpg')
    ->resize(\Cloudinary\Transformation\Resize::scale()->width(500))
    ->overlay(\Cloudinary\Transformation\Overlay::source('logo1_public_id')
        ->resize(\Cloudinary\Transformation\Resize::scale()->width(100))
        ->gravity(\Cloudinary\Transformation\Gravity::southEast())
        ->position(\Cloudinary\Transformation\Position::absolute()->x(10)->y(20)))
    ->overlay(\Cloudinary\Transformation\Overlay::source('logo2_public_id')
        ->resize(\Cloudinary\Transformation\Resize::scale()->width(100))
        ->gravity(\Cloudinary\Transformation\Gravity::southWest())
        ->position(\Cloudinary\Transformation\Position::absolute()->x(10)->y(20)))
    ->toUrl();

echo $url;



use Cloudinary\Transformation as T;

$cloudinary = new Cloudinary();

$publicId = 'your_stored_image_public_id';

$transformedImageUrl = $cloudinary->image($publicId)
    ->transformation(
        (new T())
            ->resize(T\Resize::fill()->width(300)->height(300)->gravity('face'))
            ->border(T\Border::solid()->width(5)->color('black'))
            ->effect(T\Effect::sepia(80))
            ->rotate(T\Rotate::byAngle(20))
    )
    ->toUrl();

echo $transformedImageUrl;
