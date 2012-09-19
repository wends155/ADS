<?php
header('Content-Type: application/x-pdf');
header("Content-Disposition: inline; filename=invoice-". date("Y-m-d-H-i") . ".pdf");
header("Cache-Control: no-cache, must-revalidate");


$path = dirname(dirname(__FILE__)) . '/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once "Zend/Pdf.php";

$daily = Zend_Pdf::load('Daily.pdf');
$page = $daily->pages[0];
$font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES);
$page->setFont($font,11);
//echo "Height = {$page->getHeight()} \n";
//echo "Width  = {$page->getWidth()} \n";
$date = 'Date: 9/19/2012';
$name = 'Jellene Q. Pastoral';
$name2 = 'Rosemarie C. Villacorta';
$name3 = 'Florefie A. Remedios';
$page->drawText($date,460,720);
$page->drawText($name,54,684); // diff 14 pt
$page->drawText($name2,54,670);
$page->drawText($name3, 54, 656);
$daily->save('wewe.pdf');
?>
