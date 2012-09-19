<?php
header('Content-Type: application/x-pdf');
header("Content-Disposition: inline; filename=invoice-". date("Y-m-d-H-i") . ".pdf");
header("Cache-Control: no-cache, must-revalidate");


$path = dirname(dirname(__FILE__)) . '/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once "Zend/Pdf.php";
$pdf = new Zend_Pdf();
$page = new Zend_Pdf_Page(Zend_Pdf_Page::SIZE_LETTER);
$pdf->pages[] = $page;
$pdf->pages[] = $pdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
$font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_TIMES_BOLD);
$page->setFont($font,12);
$page->drawText('wewe',110,641);
//echo $page->getHeight();
//echo $page->getWidth();
//echo $pdf->render();
?>
