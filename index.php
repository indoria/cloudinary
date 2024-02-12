
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$apiKey = '426417412229354';
$apiSecret = 'eCZFi4a0Vw3RfEdUeFHnMoQCzEg';
$cloudName = 'da18jfrb5';
//Configuration::instance("cloudinary://$apiKey:$apiSecret@$cloudName?secure=true");

?>
<html lang="HTML5">

<head>
    <title>PHP Quick Start</title>
</head>

<body>
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Resize;

echo '<h1>Cloudinary PHP Quick Start</h1>';


Configuration::instance("cloudinary://426417412229354:eCZFi4a0Vw3RfEdUeFHnMoQCzEg@da18jfrb5?secure=true");

// Upload API
echo '<h2>Upload API Response</h2>';

// Upload the image
$upload = new UploadApi();
var_dump($upload);
$upload->upload('https://res.cloudinary.com/demo/image/upload/flower.jpg');
?>
</body>

</html>

