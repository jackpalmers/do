<?php
                                                    // Excel XLS -> CSV partie mise en attente

include("Excel/Classes/PHPExcel.php");


require_once('Excel/Classes/PHPExcel.php');

//Usage:
convertXLStoCSV('input.xls','output.csv');

// mb_convert_encoding($source_string,'ISO-8859-15','utf-8');

function convertXLStoCSV($infile,$outfile)
{
    $fileType = PHPExcel_IOFactory::identify($infile);
    $objReader = PHPExcel_IOFactory::createReader($fileType);

    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load($infile);

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
    $objWriter->save($outfile);
}





 ?>
