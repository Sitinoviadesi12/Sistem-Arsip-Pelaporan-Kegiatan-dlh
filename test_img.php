<?php
require __DIR__ . '/vendor/autoload.php';

use Intervention\Image\ImageManager;
use Intervention\Image\Format;

// Create dummy image using Driver
$manager = new ImageManager(\Intervention\Image\Drivers\Gd\Driver::class);
$image = $manager->createImage(100, 100);

$encoded = $image->encodeUsingFormat(Format::JPEG, quality: 80);

$str = (string) $encoded;
echo "Length: " . strlen($str) . "\n";
echo "First 10 bytes: " . bin2hex(substr($str, 0, 10)) . "\n";
