<ul>
    <li><a href="/src/index.php">Home</a></li>
    <li><a href="/src/transform-uploadApi.php">UploadApi</a></li>
    <li><a href="/src/transform-cloudinary.php">Cloudinary</a></li>
</ul>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$apiKey = '426417412229354';
$apiSecret = 'eCZFi4a0Vw3RfEdUeFHnMoQCzEg';
$cloudName = 'da18jfrb5';
$cloudinaryURL = "cloudinary://$apiKey:$apiSecret@$cloudName?secure=true";

require_once __DIR__ . '/../vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

use Cloudinary\Api\Admin\AdminApi;

use Cloudinary\Tag\ImageTag;

use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Gravity;
use Cloudinary\Transformation\Compass;
use Cloudinary\Transformation\Position;
use Cloudinary\Transformation\Source;
use Cloudinary\Transformation\Overlay;
use Cloudinary\Transformation\Transformation;
use Cloudinary\Transformation\Reshape;

