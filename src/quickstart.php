<?php
require_once("common.php");

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Background;

Configuration::instance($cloudinaryURL);

$upload = new UploadApi();
echo '<pre>';
echo json_encode(
    $upload->upload('https://res.cloudinary.com/demo/image/upload/flower.jpg', [
        'public_id' => 'flower_sample',
        'use_filename' => TRUE,
        'overwrite' => TRUE]),
    JSON_PRETTY_PRINT
);
echo '</pre>';



$admin = new AdminApi();
echo '<pre>';
echo json_encode($admin->asset('flower_sample', [
    'colors' => TRUE]), JSON_PRETTY_PRINT
);
echo '</pre>';


$imgtag = (new ImageTag('flower_sample'))
    ->resize(Resize::pad()
        ->width(400)
        ->height(400)
        ->background(Background::predominant())
    );

echo $imgtag;