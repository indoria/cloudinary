<?php

require_once("common.php");

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Transformation\Transformation;
use Cloudinary\Transformation\Overlay;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Source;


Configuration::instance($cloudinaryURL);

$cloudinary = new Cloudinary();


$productImageID = 'sites/450/products/80305.jpg';
$productImageURL = "https://www.afhsgear.com/$productImageID";

$logoURL = "https://api.idworks.com/logo_new_y.png";
$overlayImageEncoded = base64_encode($logoURL);

$transformedImageUrl = $cloudinary->image($productImageURL)
    ->deliveryType('fetch')
    ->resize(Resize::scale()->width(300))
    ->overlay(
        Overlay::source(
            Source::fetch($logoURL)
                ->transformation(
                    (new Transformation())
                        ->resize(Resize::scale()->width(100)->height(100))
                )
        )
        ->position((new Position())
            ->gravity('north_west')
            ->offsetX(20)
            ->offsetY(20))
    )
    ->overlay(
        Overlay::source(
            Source::fetch($logoURL)
                ->transformation(
                    (new Transformation())
                        ->resize(Resize::scale()->width(50)->height(50))
                )
        )
        ->position((new Position())
            ->gravity('north_west')
            ->offsetX(100)
            ->offsetY(100))
    )
    ->toUrl();
echo "<img src='$transformedImageUrl' />";