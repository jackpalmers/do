<?php
if(isset($_GET['id']))
{
$file = "converts/".$_GET['id'];
$file = str_replace("..","",$file);
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=output.csv');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    unlink($file);
    exit;
}

}
?>
