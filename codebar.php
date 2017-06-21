

<?php
require_once('class/BCGColor.php');
require_once('class/BCGDrawing.php');
require_once('class/BCGcode128.barcode2d.php');

$colorFront = new BCGColor(0, 0, 0);
$colorBack = new BCGColor(255, 255, 255);

// Barcode Part
$code = new BCGcode128();
$code->setScale(2);
$code->setColor($colorFront, $colorBack);
$code->parse('861000000000000');

// Drawing Part
$drawing = new BCGDrawing('', $colorBack);
$drawing->setBarcode($code);
$drawing->draw();

header('Content-Type: image/png');

$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
?>
