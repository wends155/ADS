<?php
$path = dirname(dirname(__FILE__)) . '/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once "Zend/Pdf.php";
$pdf = new Zend_Pdf();
$page = new Zend_Pdf_Page(Zend_Pdf_Page::SIZE_LETTER);
echo "Height = {$page->getHeight()}\n";
echo "Width = {$page->getWidth()}\n";
$pdf->pages[0] = $page;
$pdf->render();
?>
