<html lang="HTML5">
<head>
    <title>PHP Quick Start</title>
</head>
<body>

<?php
$key = '';
$secret = '';
$cloudName = '';

require __DIR__ . '/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Cloudinary;

Configuration::instance("cloudinary://$key:$secret@$cloudName?secure=true");
$cloudinary = new Cloudinary();