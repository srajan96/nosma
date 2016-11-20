<?php
echo "In the pdf file";

require("fpdf.php");

$img = $_POST['filename'];

	
	
	$pdf = new FPDF();

foreach ($img as $image1) 
{
	$image = dirname(__FILE__).DIRECTORY_SEPARATOR."uploads/".$image1;
	//echo $image;
    $pdf->AddPage();
	$pdf->Image($image,20,40,100,100);
}

$pdf->Output("download12345.pdf");
echo "Your file downloaded successfully.";
echo dirname(__FILE__); 

?>