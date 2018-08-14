<?php
		



	require('fpdf181/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->AddFont('arial_ce','','arial_ce.php');
	$pdf->AddFont('arial_ce','I','arial_ce_i.php');
	$pdf->AddFont('arial_ce','B','arial_ce_b.php');
	$pdf->AddFont('arial_ce','BI','arial_ce_bi.php');
	$pdf->Cell(40,10, "

		Przyjęto zgłoszenie nr" .$nr_zgloszenia." "

	);
	$pdf->Output();
?>