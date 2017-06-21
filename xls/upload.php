<?php
include('../Excel/Classes/PHPExcel.php');

$output_dir = "uploads/";
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];

	if($_FILES["file"]["size"] > 100*1024)
	{
		$ret['error']= 'Files more than 100KB are not allowed';
	}
	else
	{

		$fileName = $_FILES["myfile"]["name"];
		$generated = gen_random_string().".csv";
		try
		{
			convertXLStoCSV($_FILES["myfile"]["tmp_name"],"converts/".$generated);
			$ret[]= $generated;
		}
		catch(Exception $e)
		{
			$ret['error'] =$e->getMessage();
		}
	}
    echo json_encode($ret);
 }


function convertXLStoCSV($infile,$outfile)
{
	$fileType = PHPExcel_IOFactory::identify($infile);
	$objReader = PHPExcel_IOFactory::createReader($fileType);

	$objReader->setReadDataOnly(true);
	$objPHPExcel = $objReader->load($infile);



	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
	$objWriter->save($outfile);
}

function gen_random_string($length=32)
{
    $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];

    }
    return $final_rand;
}
 ?>
