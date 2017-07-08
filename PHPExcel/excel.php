<div class="head">
  <h1 class="title1"> <a href="../index.php">Accueil</a> </h1>
  <div class="slogan"></div>
</div>

<?php

header('Content-Type: text/html; charset=UTF-8');

include('../block/header.php');


require 'Classes/PHPExcel/IOFactory.php';
include 'Classes/PHPExcel.php';


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "do";


$inputfilename = $_FILES['file']['tmp_name'];

$exceldata = array();

// Create connection
$dbb = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$dbb) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($dbb, "do");
mysqli_set_charset($dbb, 'utf8');

//  Read your Excel workbook
try
{
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
}
catch(Exception $e)
{
    die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
for ($row = 16; $row <= $highestRow; $row++)
{
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
 //foreach($rowData[0] as $k=>$v) {

    //  Insert row data array into your database of choice here

    //while ( 'Zone_de_stockage' != "" )


	$req = "INSERT INTO materiels (Urgence, Etat_du_dossier, Zone_de_stockage, Num_Entree_CRESA, Num_Contenu_CRESA, Marque,
                                    Autre_marque, Modele_Type, Num_IMEI, Titre, Num_de_serie, Description)

			VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."',
              '".$rowData[0][5]."', '".$rowData[0][6]."', '".$rowData[0][7]."', '".$rowData[0][8]."', '".$rowData[0][9]."',
              '".$rowData[0][10]."', '".$rowData[0][11]."')";


	if (mysqli_query($dbb, $req)) {
		$exceldata[] = $rowData[0];
	} else {
		echo "Error: " . $req . "<br>" . mysqli_error($dbb);
	}
}

print_r($rowData);

// Print excel data
echo "<table>";
foreach ($exceldata as $index => $excelraw)
{
	echo "<tr>";
	foreach ($excelraw as $excelcolumn)
	{
		echo "<td>".$excelcolumn."</td>";
	}
	echo "</tr>";
}
echo "</table>";

mysqli_close($dbb);

?>
